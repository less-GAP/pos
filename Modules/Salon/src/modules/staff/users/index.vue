<script setup>
import {reactive, ref, h, watch} from "vue";
import {DeleteOutlined, EditOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {useAuthStore} from "@/stores/auth";

const prefix = '/staff/user'
let store = null
const {
  createApi,
  deleteApi,
  updateApi
} = UseEloquentRouter(prefix)
const isShowModal = ref(false)
const auth = useAuthStore();
const itemActions = [
  {
    label: 'User Detail',
    icon: 'fa fa-eye',
    action: (item, reload) => {
      //showEditUser({}, reload)
      router.replace(prefix + '/' + item.id)
    }
  },
  {
    label: 'Delete',
    icon: 'fa fa-trash',
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
      router.replace(prefix + '/new')
    }
  }
]
const columns = [
  {title: 'Username', width: 200, key: 'username'}
  , {title: 'Name', key: 'full_name'}
  , {title: 'Role', key: 'roles'}
]
const tableConfig = {
  columns,
  listActions,
  itemActions
}

function loadStore(value) {
  store = value
}
</script>

<template>
  <div class="content">
    <div class="page-header">
      <div class="page-title">
        <h4>User List</h4>
        <h6>Manage your sales</h6>
      </div>
      <div class="page-btn">
        <router-link to="/staff/user/new" class="btn btn-added"><img src="@/assets/img/icons/plus.svg" alt="img"
                                                                     class="mr-1">Add
          User
        </router-link>
      </div>
    </div>
    <ApiStore @load="loadStore" url="/staff/user/list" :config="{autoload:false}">
      <template #default="{store}">
        <DataTable @register="registerTable" v-bind="tableConfig" :store="store">
          <template #cellAction[edit]="{item,actionMethod}">
            <a-button
              type="text"
              primary
              @click="actionMethod"
              v-if="$auth.hasPermission('user.edit')"
              :icon="h(EditOutlined)"
              label=""
              :outline="true"
            >
            </a-button>
          </template>
          <template #cellAction[delete]="{item,actionMethod}">
            <a-popconfirm
              title="Are you sure delete this user?"
              ok-text="Yes"
              cancel-text="No"
              @confirm="actionMethod"
            >
              <a-button
                type="text"
                v-if="$auth.hasPermission('user.delete')"
                danger
                :icon="h(DeleteOutlined)"
                label=""
                :outline="true"
              >
              </a-button>

            </a-popconfirm>
          </template>
          <template #cell[full_name]="{item,column}">
            <img class="float-left w-10 h-10 rounded-full" :src="item.profile_photo_url"
                 :alt="item.full_name">
            <div class="float-left pl-3">
              <div class="text-base font-semibold">{{ item.full_name }}</div>
              <div class="font-normal text-gray-500">{{ item.email }}</div>
            </div>
          </template>
          <template #cell[deleted]="{item,column}">
            <a-switch @change="updateApi(item.id,{deleted:item.deleted})" checkedValue="active"
                      unCheckedValue="inactive"
                      v-model:checked="item.deleted"/>
          </template>
          <template #cell[roles]="{item,column}">
            <div v-for="role in item.roles" :key="role.id">
              <a-tag>{{ role.name }}</a-tag>
            </div>
          </template>
        </DataTable>
      </template>
    </ApiStore>

  </div>
  <router-view></router-view>
</template>
