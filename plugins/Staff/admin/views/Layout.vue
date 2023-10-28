<script setup>
import {ref} from "vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SideBar from "./SideBar.vue";
import menus from "./menus";

</script>

<template>
  <LayoutAuthenticated :breadcrumb="menus">
    <template #moduleSidebar>
      <SideBar></SideBar>
    </template>
    <router-view></router-view>
  </LayoutAuthenticated>

</template>
