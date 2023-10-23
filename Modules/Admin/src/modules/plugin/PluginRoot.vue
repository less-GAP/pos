<script setup>
import {ref} from "vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SideBar from "./SideBar.vue";
import PluginView from "./PluginView.vue";
import menus from "./menus";

</script>

<template>
  <div>
      <PluginView :name="$route.matched[0].meta.plugin" :path="$route.matched[0].path" :key="$route.matched[0].path"></PluginView>
  </div>
</template>
