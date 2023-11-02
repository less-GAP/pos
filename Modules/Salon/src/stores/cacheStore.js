import {defineStore} from "pinia";
import Api from "@/utils/Api";

export function createCacheStore(key, defaultValue = {}) {
  const store = defineStore(key, {
    state: () => ({
      /* User */
      data: defaultValue,
      loaded: false,
      loading: false,
      version: 1
    }),
    actions: {},
    persist: {
      enabled: true
    },
  })();
  return store;
}
