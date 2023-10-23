<script setup>
import {computed, h, compile, ref, reactive, getCurrentInstance} from "vue";
import Api from "@/utils/Api";
import VRuntimeTemplate from "vue3-runtime-template";
import {AsyncData} from "@/components";
import {getPlugin} from "@/utils/PluginManager"
import router from "@/router";

const template = ref();
const templateProps = ref({});
const props = defineProps(['name', 'path'])
const $instance = getCurrentInstance()
getPlugin(props.name || router.currentRoute?.value?.meta?.plugin).then(plugin => {
  plugin.view(props.path || router.currentRoute?.value?.fullPath, {
    Api,
    computed,
    h,
    compile,
    ref,
    reactive,
    component:$instance,
    currentRoute: router.currentRoute,
    router
  }).then(rs => {
    template.value = rs.template
    templateProps.value = rs.templateProps
  })
})

</script>

<template>
  <v-runtime-template ref="root" :template-props="templateProps" :template="template"></v-runtime-template>
  <router-view></router-view>
</template>
