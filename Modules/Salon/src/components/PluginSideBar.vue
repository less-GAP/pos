<script setup>

import {mdiCart} from "@mdi/js";
import {BaseIcon} from "@/components";
const props = defineProps({
  menus:{
    type:Array,
    default:[]
  }
})
</script>
<template>
  <h1 class="px-5   text-2xl text-bold text-primary dark:text-white">Sales</h1>
  <div class="my-3 mx-4 h-px border-b dark:bg-navy-500"></div>
  <div id="sidebar-menu" class="sidebar-menu mt-5  ">
    <ul>
      <template v-for="(menu, key) in menus" :key="key">
        <li :class="$route.matched.filter(matched=>matched.path.includes(menu.path)).length?'active':''"
            v-if="$auth.hasPermission(menu.permission)">
          <template v-if="menu.path">
            <router-link :to="menu.path" class="subdrop flex items-center text-slate-600  w-full">
              <BaseIcon v-if="menu.icon" :path="menu.icon" class="flex-none"
                        :w="'w-' + $style.menu.iconSize" :size="$style.menu.iconSize"/>
              <span class="flex-1 ml-3 text-left whitespace-nowrap"> {{ menu.meta?.title }}</span>
              <svg v-if="menu.children?.length" class="w-3 h-3" aria-hidden="true"
                   xmlns="http://www.w3.org/2000/svg" fill="none"
                   viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 4 4 4-4"/>
              </svg>
            </router-link>
          </template>
          <ul v-if="menu.children?.length"
              :class="($appState.hoverSideBar || $appState.showMenu) && menu.children?.filter(child=>$route.fullPath.includes(child.path)).length ? '!block' : 'hidden'">
            <li v-for="(child, index) in menu.children" :key="index">
              <router-link
                :class="$route.matched.filter(matched=>matched.path.includes(child.path)).length?'active':''"
                :to="child.path">{{ child.meta?.title }}
              </router-link>
            </li>
          </ul>
        </li>
      </template>
    </ul>
  </div>
</template>
