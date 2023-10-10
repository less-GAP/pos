<script setup>
import {mdiForwardburger, mdiBackburger, mdiMenu} from "@mdi/js";
import {ref} from "vue";
import {useRouter, RouterLink} from "vue-router";
import menuAside from "@/menuAside.js";
import menuNavBar from "@/menuNavBar.js";
import {useMainStore} from "@/stores/main.js";
import {useStyleStore} from "@/stores/style.js";
import Header from "./Header.vue";
import Sidebar from "./Sidebar.vue";
import Footer from "./Footer.vue";
import {onMounted} from 'vue'

const props = defineProps({
  showSideBar: {
    type: Boolean,
    default: true
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
  <div :class="(!$appState.showMenu && !$appState.hoverSideBar)?'mini-sidebar':'expand-menu'" class="main-wrapper">
    <Header class="bg-dark" :style="{height:$style.theme.headerHeight}"></Header>
    <Sidebar v-if="showSideBar" class="h-full  d-inline"></Sidebar>
    <div class="page-wrapper">
      <div class="content">

        <slot/>
      </div>
    </div>

  </div>


</template>
<style lang="scss">
#sidebar.collapsed {

}
</style>
