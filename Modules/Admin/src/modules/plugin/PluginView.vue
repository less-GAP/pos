<script setup>
import {computed, h, compile, ref, unref, reactive, getCurrentInstance} from "vue";
import Api from "@/utils/Api";
import VRuntimeTemplate from "vue3-runtime-template";
import {AsyncData} from "@/components";
import {getPlugin} from "@/utils/PluginManager"
import router from "@/router";
import {onActivated, onDeactivated} from 'vue'
import ModelManager from "@/utils/ModelManager";
import {createApiStore} from "@/stores/apiStore";
import {createCacheStore} from "@/stores/cacheStore";
import {useAttrs} from 'vue'

const attrs = useAttrs()
const template = ref();
const templateProps = ref({});
const props = defineProps(['name', 'path', 'view', 'pluginName'])
const emit = defineEmits(['leave', 'created', 'close'])
const $instance = getCurrentInstance()
const plugin = ref()
getPlugin(props.pluginName).then(_plugin => {
  plugin.value = _plugin
  plugin.value.view(props.view, {
    ...attrs
    ,
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
    createApiStore,
    createCacheStore,
    component: $instance,
    modelManager: ModelManager,
    currentRoute: router.currentRoute,
    router,
  }).then(rs => {
    template.value = rs.template
    templateProps.value = rs.templateProps
  })
})

</script>

<template>
  <div v-if="plugin">
    <v-runtime-template :template-props="{...templateProps}" :template="template"></v-runtime-template>
    <router-view v-slot="{ Component }">
      <transition>
        <component :is="Component" :pluginName="pluginName"
                   :view="$route.meta.view"
                   :key="$route.path"/>
      </transition>
    </router-view>
  </div>
</template>
