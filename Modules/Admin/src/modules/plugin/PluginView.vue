<script setup>
import {computed, h, compile, ref, reactive, getCurrentInstance} from "vue";
import Api from "@/utils/Api";
import VRuntimeTemplate from "vue3-runtime-template";
import {AsyncData} from "@/components";
import {getPlugin} from "@/utils/PluginManager"
import router from "@/router";
import {onActivated, onDeactivated} from 'vue'

const template = ref();
const templateProps = ref({});
const props = defineProps(['name', 'path', 'plugin'])
const emit = defineEmits(['leave'])
const $instance = getCurrentInstance()
props.plugin.view(props.path || router.currentRoute?.value?.fullPath, {
  Api,
  computed,
  h,
  compile,
  ref,
  reactive,
  onActivated,
  onDeactivated,
  component: $instance,
  currentRoute: router.currentRoute,
  router
}).then(rs => {
  template.value = rs.template
  templateProps.value = rs.templateProps
})
</script>

<template>
  <div>
    <v-runtime-template :template-props="templateProps" :template="template"></v-runtime-template>
    <router-view v-slot="{ Component }">
      <transition>
        <component :is="Component" :plugin="plugin"
                   :key="$route.path"/>
      </transition>
    </router-view>
  </div>
</template>
