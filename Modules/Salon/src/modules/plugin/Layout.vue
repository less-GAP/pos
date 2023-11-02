<script setup>
import {compile, computed, h, onActivated, onDeactivated, reactive, ref} from "vue";
import PluginView from "./PluginView.vue";
import PluginSideBar from "./PluginSideBar.vue";
import {getPlugin} from "@/utils/PluginManager";
import router from "@/router";
import Api from "@/utils/Api";


const menus = [
  {
    meta: {
      title: "Plugin list",
    },
    permission: 'Plugin',
    path: "/plugin/list",
  },

]
</script>

<template>
  <LayoutAuthenticated :breadcrumb="menus">
    <template #moduleSidebar>
      <PluginSideBar title="Plugins" :menus="menus"></PluginSideBar>
    </template>
    <router-view>
    </router-view>
  </LayoutAuthenticated>
</template>
