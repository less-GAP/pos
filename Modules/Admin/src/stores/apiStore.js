import {defineStore} from "pinia";
import {watch} from "vue";
import Api from "@/utils/Api";

export function createApiStore(url, _config = {}, defaultData) {
  const config = {
    ...{
      cache: false,
      params: {
        filter: {}
      },
      autoload: true,
      versionKey: null
    }, ..._config
  }
  function getFilter(filter) {
    if (!filter) {
      return {}
    }
    let rs = {};
    for (let filterKey in filter.value) {
      rs["filter[" + filterKey + "]"] = filter.value[filterKey];
    }
    return rs;
  }

  const store = defineStore(url, {
    state: () => ({
      /* User */
      data: defaultData,
      params: config.params?config.params:{},
      originalData: {},
      loaded: false,
      loading: false,
      versionKey: config.versionKey,
      version: 1
    }),
    actions: {
      async submitUpdate(newUrl = null, data = null) {
        if (!newUrl) {
          newUrl = url
        }
        if (!data) {
          data = this.data
        }

        this.loading = true
        return Api.post(newUrl,
          data
        )
          .then((rs) => {
            if (rs.data?.result) {
              this.data = rs.data.result
              this.originalData = {...rs.data.result}
            }
          })
          .catch((error) => {
            return false;
          }).finally(() => {
            this.loading = false
          });
      },

      async fetch(params = {}) {
        Object.assign(this.params, params)
        return Api.get(url,
          {params: {...this.params, ...getFilter(this.params.filter)}}
        )
          .then((rs) => {
            if (rs.data) {
              this.data = rs.data
              this.originalData = {...rs.data}
            }
            return rs
          })
      },
      async init(params) {
        if (this.loaded) {
          return '';
        }
        if (config.autoload) {
          await this.fetch(params);
          this.loaded = true;
        }
      },
    },
    persist: {
      enabled: config.cache ? true : false
    },
  })();
  store.init(config.params)
  return store;
}
