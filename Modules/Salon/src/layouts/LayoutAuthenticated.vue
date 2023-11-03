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
import {
  ExclamationCircleOutlined,
  UserOutlined,
  SettingOutlined,
  ShoppingOutlined,
  ImportOutlined,
  MailOutlined
} from '@ant-design/icons-vue';

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
  <a-layout style="height: 100vh" class="layout">

    <div class="flex items-center justify-between" style="padding: 0 50px;height: 40px;background: white" theme="light">
      <a href="/" class="logo ml-2 mt-2 logo-normal">
        <img style="height: 30px" src="@/assets/img/logo.png" alt="">
      </a>
      <a-space>

        <a-button type="text">
          <template #icon>
            <ExclamationCircleOutlined/>
          </template>
          Hỗ trợ
        </a-button>
        <a-button type="text">
          <MailOutlined/>
        </a-button>
        <a-button type="text">
          <SettingOutlined/>
        </a-button>
        <a-dropdown>
          <template #overlay>
            <a-menu @click="handleMenuClick">
              <a-menu-item key="1">
                <UserOutlined/>
                Tài khoản
              </a-menu-item>
              <a-menu-item key="2">
                <ShoppingOutlined/>
                Thông tin gian hàng
              </a-menu-item>
              <a-menu-item key="3">
                <ImportOutlined/>
                Đăng xuất
              </a-menu-item>
            </a-menu>
          </template>
          <a-button type="text">
            <template #icon>
              <UserOutlined/>
            </template>
            {{ $auth.user?.full_name }}
          </a-button>
        </a-dropdown>

      </a-space>
    </div>
    <TopMenu></TopMenu>
    <a-layout>
      <a-layout-content style="padding: 0 15px;margin-top:20px;margin-bottom: 20px">


        <slot/>

      </a-layout-content>

    </a-layout>
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
