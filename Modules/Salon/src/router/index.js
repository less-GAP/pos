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


async function getRoutes() {
  const rs = await Api.get('/plugin/routes')
  const pluginRoutes = rs.data

  for (const name in pluginRoutes) {
    routes = [...routes, ...getApiRoutes(name, pluginRoutes[name])]
  }
  return routes
}

const router = createRouter({
  history: createWebHashHistory(),
  routes: await getRoutes(),
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
