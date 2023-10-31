import {
  createRouter,
  createWebHashHistory
} from "vue-router";
import Home from "@/modules/HomeView.vue";
import {
  useAuthStore
} from "@/stores/auth";
import {
  useAppStateStore
} from "@/stores/appState";
import Api from "@/utils/Api";

const publicPages = ['/login'];

let routes = [
  {
    meta: {
      title: "Dashboard",
    },
    path: "/",
    name: "home",
    component: Home,
  },
  {
    meta: {
      title: "Login",
      isPublic: true,
    },
    path: "/login",
    name: "login",
    component: () => import("@/modules/LoginView.vue"),
  },
  // {
  //   path: '/:pathMatch(.*)*', component: () =>
  //     import('@/modules/plugin/PluginLayout.vue')
  // }
];
const modules =
  import.meta.globEager('./../modules/**/router.js');

Object.keys(modules).forEach((key) => {
  const mod = modules[key].default || {};
  routes = [...routes, ...mod]
});

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

const rs = await Api.get('/plugin/routes')
const pluginRoutes = rs.data

for (const name in pluginRoutes) {
  routes = [...routes, ...getApiRoutes(name, pluginRoutes[name])]
}
const router = createRouter({
  history: createWebHashHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return savedPosition || {
      top: 0
    };
  },
});

router.beforeEach(async (to) => {
  // redirect to login page if not logged in and trying to access a restricted page
  const auth = useAuthStore();
  if (!auth.hasPermission(to.meta?.permission)) {
    // alert('Permission Denied');
    return '';
  }
  if (!to.meta.isPublic && !auth.isLogin()) {
    auth.returnUrl = to.fullPath;
    return '/login';
  }
  useAppStateStore().setRoute(to)
  useAppStateStore().setTitle(to.meta.title)
});
export default router;
