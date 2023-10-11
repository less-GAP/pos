<script setup>
import {BaseIcon} from "@/components";
import menuAside from "@/menuAside.js";
import router from "@/router";

</script>
<template>
  <div @mouseover="$appState.hoverSideBar = true" @mouseleave="$appState.hoverSideBar = false"
       class="sidebar flex flex-col" id="sidebar">
    <div :class="$appState.showMenu?'active':''" class="header-left  relative w-full " style="
    display: inline-flex;
    justify-content: space-between;
    padding: 10px;
    align-items: center;
">
      <a href="/l" class="logo logo-normal">
        <img src="@/assets/img/logo.png" alt="">
      </a>
      <a href="/" class="logo logo-white">
        <img src="@/assets/img/logo-white.png" alt="">
      </a>
      <a href="/" class="logo-small">
        <img src="@/assets/img/logo-small.png" alt="">
      </a>
      <a @click="$appState.showMenu = !$appState.showMenu" id="toggle_btn">
      </a>
    </div>
    <div class="slimScrollDiv" style="position: relative; overflow: auto; width: 100%;flex:1 ">
      <div id="sidebar-menu" class="sidebar-menu">
        <ul>

          <template v-for="(menu, key) in menuAside" :key="key">
            <li :class="$route.matched.filter(matched=>matched.path.includes(menu.path)).length?'active':''"
                v-if="$auth.hasPermission(menu.permission)" class="submenu">
              <template v-if="menu.path">
                <router-link :to="menu.path" class="subdrop flex items-center  w-full">
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
              <template v-else>
                <a href="#" class="subdrop flex items-center  w-full">
                  <BaseIcon v-if="menu.icon" :path="menu.icon" class="flex-none"
                            :w="'w-' + $style.menu.iconSize" :size="$style.menu.iconSize"/>
                  <span class="flex-1 ml-3 text-left whitespace-nowrap"> {{ menu.meta?.title }}</span>
                  <svg v-if="menu.children?.length" class="w-3 h-3" aria-hidden="true"
                       xmlns="http://www.w3.org/2000/svg" fill="none"
                       viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 4 4 4-4"/>
                  </svg>
                </a>
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
      <div class="slimScrollBar"
           style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 77.1897px;"></div>
      <div class="slimScrollRail"
           style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
    </div>
  </div>

</template>
<style lang="scss" scoped>
#sidebar.collapsed {
  a :not(:first-child) {
    display: none;
  }

  button :not(:first-child) {
    display: none;
  }
}

.sidebar .sidebar-menu > ul > li:hover ul {
  display: block !important;
}
</style>
