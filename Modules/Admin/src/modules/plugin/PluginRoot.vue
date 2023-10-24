<script setup>
import {compile, computed, h, onActivated, onDeactivated, reactive, ref} from "vue";
import PluginView from "./PluginView.vue";
import PluginSideBar from "./PluginSideBar.vue";
import {getPlugin} from "@/utils/PluginManager";
import router from "@/router";
import Api from "@/utils/Api";

const plugin = ref()
getPlugin(router.currentRoute?.value?.meta?.plugin).then(_plugin => {
  plugin.value = _plugin
})

</script>

<template>
  <LayoutAuthenticated v-if="plugin" :breadcrumb="plugin.sideMenus()">
    <template #moduleSidebar>
      <PluginSideBar :title="plugin.getTitle()" :menus="plugin.sideMenus()"></PluginSideBar>
    </template>
    <router-view>
        <PluginView :hasChildRoute="true" :plugin="plugin" :path="$route?.matched[1].path"
                    :key="$route?.matched[1].path"/>
    </router-view>
  </LayoutAuthenticated>
</template>
