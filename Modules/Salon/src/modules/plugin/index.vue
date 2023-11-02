<script setup>
import {computed, h, compile, ref, inject, reactive, getCurrentInstance} from "vue";
import Api from "@/utils/Api";
import VRuntimeTemplate from "vue3-runtime-template";
import {AsyncData} from "@/components";
import {getPlugins} from "@/utils/PluginManager"
import router from "@/router";
import {onActivated, onDeactivated} from 'vue'

import {SettingOutlined, CheckOutlined, EditOutlined, EllipsisOutlined} from '@ant-design/icons-vue';
import Dialog from "@/utils/Dialog";

const plugins = ref([])
getPlugins().then(rs => {
  plugins.value = rs
})
const confirmAction = async function (message, status, plugin) {
  Dialog.confirm({
    title: message,
  }, () => {
    return Api.post('/plugin/status', {name: plugin.config.name, status}).then(rs => {
      plugin.data = rs.data
      return rs.data
    })
      .catch(error => {
        Dialog.showValidationMessage(
          `Request failed: ${error}`
        )
      })
  }).then((rs) => {
    if (rs) {
      Dialog.open({
        title: `Plugin status is ${status}!`
      })
    }
  })
}

const installPlugin = async function (plugin) {
  plugin.loading = true

  Api.post('/plugin/install', {name: plugin.config.name}).then(rs => {
    plugin.data = rs.data
    Dialog.open({
      title: `Plugin ${plugin.config.name} were installed!`
    })
    return rs.data
  })
    .catch(error => {
      Dialog.showValidationMessage(
        `Request failed: ${error}`
      )
    }).finally(() => {
    plugin.loading = false
  })


}

</script>

<template>
  <div>
    <a-row :gutter="[10]">
      <a-col v-for="plugin in plugins" :span="6">

        <a-card hoverable>
          <template #cover>
            <img
              style="height:200px;object-fit: cover"

              alt="example"
              :src="plugin.config.image"
            />
          </template>
          <template #actions>


            <!--        <a-dropdown trigger="click">-->
            <!--          <template #overlay>-->
            <!--            <a-menu @click="handleMenuClick">-->
            <!--              <a-menu-item key="1">Deactive</a-menu-item>-->
            <!--              <a-menu-item key="2">2nd item</a-menu-item>-->
            <!--            </a-menu>-->
            <!--          </template>-->
            <!--          <ellipsis-outlined key="ellipsis"/>-->
            <!--        </a-dropdown>-->
          </template>
          <a-card-meta :title="plugin.config.name" :description="plugin.config.description">

          </a-card-meta>
          <br>
          <a-button v-if="plugin.data.is_installed!=1" :loading="plugin.loading" @click="installPlugin(plugin)"
                    type="primary">Install
          </a-button>
          <a-button v-else-if="plugin.data.status=='active'" :loading="plugin.loading"
                    @click="confirmAction('Are you sure to disable this plugin!','disable',plugin)"
                    type="primary" ghost>
            <template #icon>
              <CheckOutlined></CheckOutlined>
            </template>
            Active
          </a-button>

          <a-button v-else :loading="plugin.loading"
                    @click="confirmAction('Are you sure to active this plugin!','active',plugin)"
                    type="primary" ghost>Disable
          </a-button>
          <a-dropdown class="float-right" trigger="click">
            <a-button link class="ant-dropdown-link" @click.prevent>
              ...
            </a-button>
            <template #overlay>
              <a-menu @click="(e)=>confirmAction('Are you sure to '+e.key+' this plugin!',e.key,plugin)">
                <a-menu-item key="reset">
                  <a href="javascript:;">Reset</a>
                </a-menu-item>
                <a-menu-item key="disable">
                  <a href="javascript:;">Disable</a>
                </a-menu-item>
                <a-menu-item key="uninstall">
                  <a href="javascript:;">Uninstall</a>
                </a-menu-item>

              </a-menu>
            </template>
          </a-dropdown>
        </a-card>
      </a-col>

    </a-row>
  </div>
  <router-view>
  </router-view>
</template>
