import {createApp} from "vue";
import {createPinia} from "pinia";

import App from "./App.vue";
import router from "./router";
import {useMainStore} from "@/stores/main.js";
import {useStyleStore} from "@/stores/style.js";
import {darkModeKey, styleKey} from "@/config.js";

import "./css/main.css";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import {useAuthStore} from "@/stores/auth";
import piniaPersist from 'pinia-plugin-persist'
import Api from "@/utils/Api";
import {url} from "@/utils/Url";
import {useTranslation} from "@/utils/Translation";
import Antd from 'ant-design-vue';
import {useAppStateStore} from "@/stores/appState";
import Format from "@/utils/Format";
import Vue3Signature from "vue3-signature"
import * as config from "@/config";

import {useProfileState} from "@/lessgap/stores/ProfileStore";
import {
  ApiData,
  ApiSelect,
  InputMoney,
  ApiStore,
  DataTable,
  InputUpload,
  PluginSideBar,
  ApiSelectObject
} from "@/components";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import {createApiStore} from "@/stores/apiStore";
import {EloquentRouter} from "@/utils/EloquentRouter";
import PluginView from "@/modules/plugin/PluginView.vue";
import ModelManager from "@/utils/ModelManager";
import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'
import {createCacheStore} from "@/stores/cacheStore";
/* Init Pinia */
const pinia = createPinia();
pinia.use(piniaPersist)
let pluginRoutes = []
const rs = await Api.get('/plugin/routes')
pluginRoutes = rs.data

function getApiRoutes(name, routes, isChildren = false) {
  let result = []
  for (let path in routes) {
    const route = routes[path]
    const newRoute = {
      path: path,
      component: !isChildren ? () => import('@/modules/plugin/PluginRoot.vue') : () => import('@/modules/plugin/PluginView.vue'),
      name: path,
      children: route.children ? getApiRoutes(name, route.children, true) : [],
      meta: {plugin: name, view: route.view, ...route.meta}
    }
    result.push(newRoute)
  }
  return result

}

let apiRoutes = []
for (const name in pluginRoutes) {
  apiRoutes = [...getApiRoutes(name, pluginRoutes[name])]
}
router.addRoute(apiRoutes)
/* Create Vue app */
const myApp = createApp(App).use(Vue3Signature)
  .use(router)
  .use(VueSweetalert2)
  .use(pinia)
  .component('ApiSelectObject', ApiSelectObject)
  .component('LayoutAuthenticated', LayoutAuthenticated)
  .component('PluginSideBar', PluginSideBar)
  .component('Calendar', VueCal)
  .component('ApiStore', ApiStore)
  .component('InputMoney', InputMoney)
  .component('ApiData', ApiData)
  .component('InputUpload', InputUpload)
  .component('ApiSelect', ApiSelect)
  .component('DataTable', DataTable)
  .component('PluginView', PluginView)
/* Init Pinia stores */
const mainStore = useMainStore(pinia);
const styleStore = useStyleStore(pinia);
const authStore = useAuthStore();
const appState = useAppStateStore();
const profileState = useProfileState();
appState.fetch()
profileState.fetch()
const translation = useTranslation();

myApp.config.globalProperties.$config = config;
myApp.config.globalProperties.$modelManager = ModelManager;
myApp.config.globalProperties.$auth = authStore;
myApp.config.globalProperties.$api = Api;
myApp.config.globalProperties.$format = Format;
myApp.config.globalProperties.$style = styleStore;
myApp.config.globalProperties.$appState = appState;
myApp.config.globalProperties.$profileState = profileState;
myApp.config.globalProperties.$createApiStore = createApiStore;
myApp.config.globalProperties.$createCacheStore = createCacheStore;
myApp.config.globalProperties.$eloquentRouter = EloquentRouter();
myApp.config.globalProperties.__ = translation.__;
myApp.config.globalProperties.$url = url;
myApp.use(Antd)
  .mount("#app");
/* Fetch sample data */
// mainStore.fetch("clients");
// mainStore.fetch("history");

/* App style */
//styleStore.setStyle(localStorage[styleKey] ?? "basic");

/* Dark mode */
// if (
//   (!localStorage[darkModeKey] &&
//     window.matchMedia("(prefers-color-scheme: dark)").matches) ||
//   localStorage[darkModeKey] === "1"
// ) {
//   styleStore.setDarkMode(true);
// }

/* Default title tag */
const defaultDocumentTitle = "POS System";

/* Set document title from route meta */
router.afterEach((to) => {
  document.title = to.meta?.title
    ? `${to.meta.title} — ${defaultDocumentTitle}`
    : defaultDocumentTitle;
});
