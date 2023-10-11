<script setup>
import {BaseIcon} from "@/components";
import menuAside from "@/menuAside.js";
import router from "@/router";


</script>
<template>
  <aside @mouseover="$appState.hoverSideBar = true" @mouseleave="$appState.hoverSideBar = false"
         class="flex z-[1000] relative">
    <div
      class="flex flex-col items-center w-16 h-screen py-8 space-y-8 bg-gray-100 dark:bg-gray-900 dark:border-gray-700">

      <template v-for="(menu, key) in menuAside" :key="key">

        <router-link :to="menu.path?menu.path:'/'"
                     :class="$route.matched.filter(matched=>matched.path == menu.path).length?'!text-blue-500  !bg-blue-100 dark:!text-blue-400 dark:!bg-gray-800':''"
                     v-if="$auth.hasPermission(menu.permission)"
                     class="p-1.5 text-gray-500 relative focus:outline-nones transition-colors duration-200 rounded-lg dark:text-gray-400 dark:hover:bg-gray-800 hover:bg-gray-100">
          <a-tooltip placement="right">
            <template #title>{{ menu.meta?.title }}</template>
            <BaseIcon :w="'w-' + $style.menu.iconSize" :size="$style.menu.iconSize" :path="menu.icon"></BaseIcon>
          </a-tooltip>
          <i v-if="$route.matched.filter(matched=>matched.path == menu.path).length" style="position: absolute;
    right: -16px;
    top: 2px;
    font-size: 30px;
    color: white;" class="fa fa-caret-left"></i>
        </router-link>
      </template>

    </div>
    <div
      v-if="$slots.moduleSidebar"
      :class="($appState.showMenu?'!block':'absolute left-[100%] h-full top-0')+' '+($appState.hoverSideBar?'!block':'')"
      class="h-screen hidden py-8 overflow-y-auto  border-l border-r  w-55 bg-white dark:border-gray-700">
      <slot name="moduleSidebar"></slot>
    </div>
  </aside>
</template>
