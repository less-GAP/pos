<script setup>
import {computed, h, compile, ref, inject, reactive, getCurrentInstance} from "vue";
import Api from "@/utils/Api";
import VRuntimeTemplate from "vue3-runtime-template";
import {AsyncData} from "@/components";
import {getPlugins} from "@/utils/PluginManager"
import router from "@/router";
import {onActivated, onDeactivated} from 'vue'

import {SettingOutlined, EditOutlined, EllipsisOutlined} from '@ant-design/icons-vue';

const $swal = inject('$swal')
console.log(999, $swal)
const plugins = ref([])
getPlugins().then(rs => {
  plugins.value = rs
})
const installPlugin = async function (plugin) {

  $swal({
    title: 'Are you sure',
    showCancelButton: true,
    confirmButtonText: 'Yes',
    showLoaderOnConfirm: true,
    preConfirm: (login) => {
      return Api.post('/plugin/install', {name: plugin.config.name}).then(rs => {
        plugin.data = rs.data
        return rs.data
      })
        .catch(error => {
          $swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !$swal.isLoading()
  }).then((result) => {
    $swal({
      title: `Plugin activated!`
    })
  })

  return data;
}

</script>

<template>
  <div>
    <a-card v-for="plugin in plugins" hoverable style="width: 300px">
      <template #cover>
        <img
          alt="example"
          src="https://gw.alipayobjects.com/zos/rmsportal/JiqGstEfoWAOHiTxclqi.png"
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
      <a-button class="!bg-green-700" v-if="plugin.data.status=='active'" :loading="plugin.loading"
                @click="installPlugin(plugin)"
                type="primary">Active
      </a-button>
      <a-button v-else-if="plugin.data.is_installed!==1" :loading="plugin.loading" @click="installPlugin(plugin)"
                type="primary">Install
      </a-button>
      <a-button v-else :loading="plugin.loading" @click="installPlugin(plugin)"
                type="primary">Inactive
      </a-button>
    </a-card>
  </div>
</template>
