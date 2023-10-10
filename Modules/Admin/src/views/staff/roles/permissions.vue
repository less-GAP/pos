<script lang="ts" setup>
import {reactive, h, ref, toRaw, computed, getCurrentInstance} from "vue";
import {CloseCircleOutlined, ArrowLeftOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {ApiData} from "@/components";

const prefix = '/staff/role'
const routePath = prefix
const {proxy} = getCurrentInstance();

const {
  getDetailApi,
  attachRelationShipApi,
  // updateApi
} = UseEloquentRouter(prefix, {
  include: 'permissions'
})
const id = proxy.$route.params.id;

const loading = ref(false);

const formRef = ref();


const emit = defineEmits(["close"]);
const formState = reactive({
  name: '',
  status: 'active',
  permissions: [],
  permission_ids: [],
  description: '',
});

const fetch = async function () {
  loading.value = true;
  if (id !== 'new') {
    loading.value = true
    const value = await getDetailApi(id, {include: 'permissions'})
    Object.assign(formState, value.data)
    loading.value = false
  } else {
    loading.value = false
  }
}
fetch();

const closeDetail = function () {
  router.replace({path: routePath})
}
const toggleCheckAll = function (group) {
  group.items.map(item => {
    if (group.checkAll && !formState.permission_ids.includes(item.id)) {
      formState.permission_ids.push(item.id)
    } else if (!group.checkAll && formState.permission_ids.includes(item.id)) {
      formState.permission_ids.splice(formState.permission_ids.indexOf(item.id), 1)
    }
  })

}

async function submit() {
  await attachRelationShipApi(formState.id, 'permissions', formState.permission_ids)
}
</script>

<template>
  <a-drawer body-style="padding:0" :closable="false"
            style="position:relative;display:flex;flex-direction:column;height:100vh;"
            @close="closeDetail" :open="true" width="80vw">
    <a-form class="w-full h-full bg-gray-100 !p-5 " layout="vertical" v-bind="$config.formConfig" ref="formRef"
            :model="formState"
            @finish="submit">
      <a-card body-style="padding:10px;height:55px;"
              class="bg-gray-50  ">
        <a-button class="float-left" type="link" @click="closeDetail">
          <template #icon>
            <ArrowLeftOutlined/>
          </template>
        </a-button>
        <a-space class="float-right" align="right">
          <!--                <a-button v-if="formState.rule_detect_category_link" @click="detectCategory" :loading="loadingDraft" >Test Category</a-button>-->
          <a-button v-if="!formState.id" @click="submit()" :loading="loading" type="primary">Create</a-button>
          <a-button v-else @click="submit()" :loading="loading" type="primary" class="!bg-yellow-400">Update</a-button>
        </a-space>
      </a-card>
      <div style="height:calc(100% - 70px);margin-top:15px;overflow: auto;padding:0;" :gutter="20">
        <a-card class="row" :title="'Role '+formState.name">
          <ApiData url="/staff/permission/groups" class="col-12">
            <template #default="{data}">
              <div class="productdetails product-respon">
                <ul>
                  <li v-for="group in data" :key="group.id">
                    <h4>
                      {{ group.name }}
                      <label class="inputcheck float-right">Select All
                        <input type="checkbox"
                               v-model="group.checkAll"
                               @change="toggleCheckAll(group)"
                               :checked="group.items.filter(item=>formState.permission_ids.includes(item.id)).length == group.items.length">
                        <span class="checkmark"></span>
                      </label>
                    </h4>
                    <div class="input-checkset">
                      <ul>
                        <li v-for="item in group.items">
                          <label class="inputcheck">{{ item.name }}
                            <input v-model="formState.permission_ids"
                                   :checked="formState.permission_ids.includes(item.id)" :value="item.id"
                                   type="checkbox">
                            <span class="checkmark"></span>
                          </label>
                        </li>

                      </ul>
                    </div>
                  </li>

                </ul>
              </div>
            </template>
          </ApiData>
        </a-card>
      </div>

    </a-form>
  </a-drawer>
</template>

<style>
.ant-input {
  border-color: #d9d9d9 !important;
  border-radius: 5px !important;
}

.ant-modal-wrap {
  z-index: 100001 !important;
}

.ant-form-item {
  margin-bottom: 0;
}
</style>
