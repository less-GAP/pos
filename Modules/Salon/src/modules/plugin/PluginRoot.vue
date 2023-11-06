<script setup>
import {compile, computed, h, onActivated, onDeactivated, reactive, ref, watch} from "vue";
import PluginView from "./PluginView.vue";
import PluginSideBar from "./PluginSideBar.vue";
import {getPlugin} from "@/utils/PluginManager";
import router from "@/router";
import Api from "@/utils/Api";

const plugin = ref()
getPlugin(router.currentRoute?.value?.meta?.plugin).then(_plugin => {
  plugin.value = _plugin
})
watch(router.currentRoute, (data) => {
  getPlugin(router.currentRoute?.value?.meta?.plugin).then(_plugin => {
    plugin.value = _plugin
  })
});
</script>

<template>
  <LayoutAuthenticated v-if="plugin" :breadcrumb="plugin.sideMenus()">
    <template #moduleSidebar>
      <PluginSideBar :key="plugin?.getName()" :title="plugin.getTitle()" :menus="plugin.sideMenus()"></PluginSideBar>
    </template>
    <a-layout>
      <div :style="{ background: '#fff', padding: '24px', minHeight: '280px' }">
        <router-view>
          <PluginView v-if="$route?.matched[1]" :hasChildRoute="true" :pluginName="$route?.matched[1]?.meta.plugin"
                      :view="$route?.matched[1]?.meta.view"
                      :key="plugin?.getName()+$route?.fullPath"/>
        </router-view>
      </div>
    </a-layout>
  </LayoutAuthenticated>
</template>
