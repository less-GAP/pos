import {defineStore} from "pinia";
import Api from "@/utils/Api";
import createMatcher from 'feather-route-matcher';

export async function createPluginStore(pluginName, config = {cache: false, autoload: true, versionKey: null}) {
  const apiPrefix = '/plugin/' + pluginName

  /* Parse a string function definition and return a function object. Does not use eval.
 * @param {string} str
 * @return {function}
 *
 * Example:
 *  var f = function (x, y) { return x * y; };
 *  var g = parseFunction(f.toString());
 *  g(33, 3); //=> 99
 */
  function parseFunction(str) {
    var fn_body_idx = str.indexOf('{'),
      fn_body = str.substring(fn_body_idx + 1, str.lastIndexOf('}')),
      fn_declare = str.substring(0, fn_body_idx),
      fn_params = fn_declare.substring(fn_declare.indexOf('(') + 1, fn_declare.lastIndexOf(')')),
      args = fn_params.split(',');

    args.push(fn_body);

    function Fn() {
      return Function.apply(this, args);
    }

    Fn.prototype = Function.prototype;

    return new Fn();
  }

  const store = defineStore('plugin_' + pluginName, {
    state: () => ({
      /* User */
      config: {
        routes: []
      },
      views: {},
      route: {},
      routeMatcher: {},
      loaded: false,
      versionKey: config.versionKey,
      version: 1
    }),
    actions: {
      sideMenus() {
        return this.config.sideMenus
      },
      getName() {
        return pluginName
      },
      getTitle() {
        return this.config.title
      },
      url($path) {
        return this.config.prefix + $path
      },
      prefix() {
        return this.config.prefix
      },
      async view($path, props) {
        const route = this.routeMatcher($path)
        this.route = route
        if (!route) {
          return {
            template: '',
            props: {}
          }
        }
        const {data} = await Api.get(apiPrefix + '/view/' + route.value.view)
        const main = parseFunction(data.script.trim())

        return {
          template: data.template,
          templateProps: new main({...props, plugin: this})
        }
      },
      sidebarMenus() {
        return this.config.sidebarMenus
      },
      flatRoutes(routes) {
        let result = {}
        for (let i in routes) {
          result[i] = routes[i]
          if (routes[i].children) {
            result = {...result, ...this.flatRoutes(routes[i].children)}
          }
        }
        return result;
      },
      async fetch(params = {}) {
        const rs = await Api.get('/plugin/detail/' + pluginName, {params})
        this.config = rs.data
        this.routeMatcher = createMatcher(this.flatRoutes(this.config.routes))
      },
      async init(params = {}) {
        if (this.loaded) {
          return '';
        }
        if (config.autoload) {
          await this.fetch();
          this.loaded = true;

        }
      },
    },
    persist: {
      enabled: config.cache ? true : false
    },
  })();
  await store.init()
  return store;
}
