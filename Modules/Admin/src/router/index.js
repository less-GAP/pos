import {
  createRouter,
  createWebHashHistory
} from "vue-router";
import Home from "@/views/HomeView.vue";
import {
  useAuthStore
} from "@/stores/auth";
import {
  useAppStateStore
} from "@/stores/appState";

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
    component: () => import("@/views/LoginView.vue"),
  },
];
const modules =
  import.meta.globEager('./../views/**/router.js');

Object.keys(modules).forEach((key) => {
  const mod = modules[key].default || {};
  routes = [...routes, ...mod]
});
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
