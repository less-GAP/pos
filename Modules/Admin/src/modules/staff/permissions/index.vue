<script setup>
import {reactive, ref, h, watch} from "vue";
import {mdiBallotOutline, mdiDelete} from "@mdi/js";
import {Modal, DataTable, RemoteSelect} from "@/components";
import router from "@/router";

import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {UseDataTable} from "@/utils/UseDataTable";

const prefix = '/staff/permission'
const routePath = prefix
const {
  getListApi,
  createApi,
  deleteApi,
  updateApi
} = UseEloquentRouter(prefix, {
  include: 'group'
})
const isShowModal = ref(false)

const itemActions = [
  {
    label: 'Edit',
    action: (item, reload) => {
      //showEditUser({}, reload)
      router.push(routePath + '/' + item.id)
    }
  },
  {
    label: 'Delete',
    class: 'font-medium !text-red-600 !dark:text-red-500 hover:underline',
    confirm: true,
    action(item, reload) {
      deleteApi(item.id).then(rs => {
      }).finally(() => {
        reload();
      });
    }
  }
]
const listActions = [
  {
    label: 'Add',
    action: (reload) => {
      //showEditUser({}, reload)
      router.push(routePath + '/new')
    }
  }
]
const columns = [
  {
    title: 'Group',
    key: 'group.name',
  },
  {
    title: 'Name',
    key: 'name',

  },

  {
    title: 'Description',
    key: 'description',

  },
  {
    title: 'Status',
    key: 'status',
    width: 100
  },
  {
    title: 'Created at',
    key: 'created_at',
    width: 200
  },
]


const tableConfig = UseDataTable(getListApi, {
  columns,
  listActions,
  itemActions
})
let reloadTable = () => {
}

watch(router.currentRoute, (data) => {
  if (data.path === routePath) {
    reloadTable()
  }
});

function registerTable({reload}) {
  reloadTable = reload
}

</script>

<template>

  <DataTable @register="registerTable" v-bind="tableConfig">
    <template #lineSearch="{reload,filter,toggleSearch,loading}">
      <a-form-item label="Group">
        <RemoteSelect @change="reload" class="!w-[200px]" url="/staff/permission-group/all" labelKey="name" valueKey="id"
                      v-model:value="filter.group_id"></RemoteSelect>
      </a-form-item>
    </template>
    <template #cellAction[delete]="{item,actionMethod}">
      <a-popconfirm
        title="Bạn muốn xóa sản phẩm này?"
        ok-text="Yes"
        cancel-text="No"
        @confirm="actionMethod"
      >
        <a-button
          type="text"
          danger
          :icon="h(DeleteOutlined)"
          label=""
          :outline="true"
        >
        </a-button>
      </a-popconfirm>
    </template>
    <template #cellAction[edit]="{item,actionMethod}">
      <a-button
        class="mr-5"
        type="text"
        :icon="h(FormOutlined)"
        label=""
        :outline="true"
        @click="actionMethod"
      >
      </a-button>
    </template>
    <template #cell[image]="{item,column}">
      <a-image height="50px" class="w-20 h-auto" :src="item.image"
               :alt="item.name"/>
    </template>

    <template #cell[status]="{item,column}">
      <a-switch @change="updateApi(item.id,{status:item.status})" checkedValue="active" unCheckedValue="inactive"
                v-model:checked="item.status"/>
    </template>

  </DataTable>

  <router-view></router-view>

</template>
