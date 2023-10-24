import {defineStore} from "pinia";
import Api from "@/utils/Api";

export function createApiStore(url, config = {
  cache: false,
  params: {},
  autoload: true,
  versionKey: null
}) {
  const store = defineStore(url, {
    state: () => ({
      /* User */
      data: {},
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
      async fetch(params = null) {
        return Api.get(url,
          {params: {...config.params, ...params}}
        )
          .then((rs) => {
            this.data = rs.data
            this.originalData = {...rs.data}
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
