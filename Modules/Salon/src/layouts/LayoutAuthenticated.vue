<script setup>
import {mdiForwardburger, mdiBackburger, mdiMenu} from "@mdi/js";
import {ref} from "vue";
import {useRouter, RouterLink} from "vue-router";
import menuAside from "@/menuAside.js";
import menuNavBar from "@/menuNavBar.js";
import {useMainStore} from "@/stores/main.js";
import {useStyleStore} from "@/stores/style.js";
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import TopMenu from "./TopMenu.vue";
import {onMounted} from 'vue'

const props = defineProps({
  showSideBar: {
    type: Boolean,
    default: true
  }, breadcrumb: {
    type: Array,
    default: []
  }
})
import {
  initAccordions,
  initCarousels,
  initCollapses,
  initDials,
  initDismisses,
  initDrawers,
  initDropdowns,
  initModals,
  initPopovers,
  initTabs,
  initTooltips
} from 'flowbite'
import {useAuthStore} from "@/stores/auth";
import {useAppStateStore} from "@/stores/appState";
import {Breadcrumb} from "@/components";

// initialize components based on data attribute selectors
onMounted(() => {
  if (!useAuthStore().isLogin()) {
    router.replace('login')
  }

})


const styleStore = useStyleStore();

const router = useRouter();

const isAsideMobileExpanded = ref(false);
const isAsideLgActive = ref(false);

router.beforeEach(() => {
  isAsideMobileExpanded.value = false;
  isAsideLgActive.value = false;
});

const menuClick = (event, item) => {
  if (item.isToggleLightDark) {
    styleStore.setDarkMode();
  }

  if (item.isLogout) {
    //
  }
};
</script>

<template>
  <a-layout class="layout">
    <div class="logo"/>

    <TopMenu></TopMenu>

    <a-layout-content style="padding: 0 50px;margin-top:20px">

      <div :style="{ background: '#fff', padding: '24px', minHeight: '280px' }">

        <slot/>

      </div>
    </a-layout-content>
    <a-layout-footer style="text-align: center">
      Ant Design ©2018 Created by Ant UED
    </a-layout-footer>
  </a-layout>
</template>
<style scoped>
#components-layout-demo-top-side-2 .logo {
  float: left;
  width: 120px;
  height: 31px;
  margin: 16px 24px 16px 0;
  background: rgba(255, 255, 255, 0.3);
}

.ant-row-rtl #components-layout-demo-top-side-2 .logo {
  float: right;
  margin: 16px 0 16px 24px;
}

.site-layout-background {
  background: #fff;
}
</style>
