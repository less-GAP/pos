<script setup>
import {computed, h, compile, ref, unref, reactive, getCurrentInstance} from "vue";
import Api from "@/utils/Api";
import VRuntimeTemplate from "vue3-runtime-template";
import {AsyncData} from "@/components";
import {getPlugin} from "@/utils/PluginManager"
import router from "@/router";
import {onActivated, onDeactivated} from 'vue'
import ModelManager from "@/utils/ModelManager";

const template = ref();
const templateProps = ref({});
const props = defineProps(['name', 'path', 'view', 'pluginName'])
const emit = defineEmits(['leave', 'created', 'close'])
const $instance = getCurrentInstance()
const plugin = ref()

getPlugin(props.pluginName).then(_plugin => {
  plugin.value = _plugin
  plugin.value.view(props.view, {
    Api,
    emit,
    computed,
    h,
    compile,
    ref,
    unref,
    reactive,
    onActivated,
    onDeactivated,
    component: $instance,
    modelManager: ModelManager,
    currentRoute: router.currentRoute,
    router
  }).then(rs => {
    template.value = rs.template
    templateProps.value = rs.templateProps
  })
})

</script>

<template>
  <div v-if="plugin">
    <v-runtime-template :template-props="templateProps" :template="template"></v-runtime-template>
    <router-view v-slot="{ Component }">
      <transition>
        <component :is="Component" :plugin="plugin"
                   :key="$route.path"/>
      </transition>
    </router-view>
  </div>
</template>
