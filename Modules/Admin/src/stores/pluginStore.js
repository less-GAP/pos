import {defineStore} from "pinia";
import Api from "@/utils/Api";
import createMatcher from 'feather-route-matcher';

export async function createPluginStore(pluginName, config = {cache: false, autoload: true, versionKey: null}) {
  const apiPrefix = '/plugin/' + pluginName
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
        var main = new Function("return  " + data.script.trim().replaceAll('\n', ''))()
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
