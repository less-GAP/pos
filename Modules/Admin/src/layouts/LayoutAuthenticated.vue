<script setup>
import {mdiForwardburger, mdiBackburger, mdiMenu} from "@mdi/js";
import {ref} from "vue";
import {useRouter, RouterLink} from "vue-router";
import menuAside from "@/menuAside.js";
import menuNavBar from "@/menuNavBar.js";
import {useMainStore} from "@/stores/main.js";
import {useStyleStore} from "@/stores/style.js";
import Header from "./Header.vue";
import Sidebar2 from "./Sidebar2.vue";
import Footer from "./Footer.vue";
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
  <div class="h-screen flex  overflow-y-hidden flex-row">

    <Header class="bg-dark z-20" :style="{height:$style.theme.headerHeight}"></Header>
    <div
      :style="{height:'calc(100% - '+$style.theme.headerHeight+')','margin-top':$style.theme.headerHeight}"
      class="flex relative z-10  overflow-y-hidden w-full main-wrapper">
      <Sidebar2 v-if="showSideBar" class="h-full  d-inline">
        <template v-if="$slots.moduleSidebar" #moduleSidebar>
          <slot name="moduleSidebar"></slot>
        </template>
      </Sidebar2>

      <div class="flex-1 w-full h-full overflow-y-auto p-5 pt-3">
        <Breadcrumb v-if="!$appState.showMenu&&breadcrumb?.length" :items="breadcrumb"></Breadcrumb>
        <div class="content mt-3">

          <slot/>
        </div>
      </div>

    </div>
  </div>


</template>
<style lang="scss">
#sidebar.collapsed {

}
</style>
