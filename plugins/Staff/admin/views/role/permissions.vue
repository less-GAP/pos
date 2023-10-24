<script>function main(props) {
    let {Api, plugin, computed, h, compile, ref, reactive, currentRoute, router} = props;
    var self = this;
    Object.assign(this, props);
    this.closeDetail = function () {
        router.replace('/staff/role')
    }
    this.toggleCheckAll = function (group, data) {
        group.items.map(item => {
            if (group.checkAll && !data.permission_ids.includes(item.id)) {
                data.permission_ids.push(item.id)
            } else if (!group.checkAll && data.permission_ids.includes(item.id)) {
                data.permission_ids.splice(data.permission_ids.indexOf(item.id), 1)
            }
        })

    }
}</script>

<template>
    <a-drawer body-style="padding:0" :closable="false"
              style="position:relative;display:flex;flex-direction:column;height:100vh;"
              @close="closeDetail" :open="true" width="80vw">
        <ApiStore :url="'/staff/role/'+$route.params.id" :config="{autoload:$route.params.id=='new'?false:true}"
                  :params="{includes:'permissions'}" v-slot="{ store }">
            <a-form class="w-full h-full bg-gray-100 !p-5 " layout="vertical" v-bind="$config.formConfig" ref="formRef"
                    :model="store.data"
                    @finish="store.submitUpdate('/staff/role/'+$route.params.id+'/permissions',{id:store.data.permission_ids})">
                <a-card body-style="padding:10px;height:55px;"
                        class="bg-gray-50  ">
                    <a-button class="float-left" type="link" @click="closeDetail">
                        <template #icon>
                            <ArrowLeftOutlined/>
                        </template>
                    </a-button>
                    <a-space class="float-right" align="right">
                        <!--                <a-button v-if="store.data.rule_detect_category_link" @click="detectCategory" :loading="loadingDraft" >Test Category</a-button>-->
                        <a-button html-type="submit" v-if="!store.data.id" :loading="loading" type="primary">Create
                        </a-button>
                        <a-button v-else html-type="submit" :loading="loading" type="primary" class="!bg-yellow-400">
                            Update
                        </a-button>
                    </a-space>
                </a-card>
                <div style="height:calc(100% - 70px);margin-top:15px;overflow: auto;padding:0;" :gutter="20">
                    <a-card class="row" :title="'Role '+store.data?.name">
                        <ApiData url="/staff/permission/groups" class="col-12" v-slot="{data}">
                            <div class="productdetails product-respon">
                                <ul>
                                    <li v-for="group in data" :key="group.id">
                                        <h4>
                                            {{ group.name }}
                                            <label class="inputcheck float-right">Select All
                                                <input type="checkbox"
                                                       v-model="group.checkAll"
                                                       @change="toggleCheckAll(group,store.data)"
                                                       :checked="group.items.filter(item=>store.data.permission_ids.includes(item.id)).length == group.items.length">
                                                <span class="checkmark"></span>
                                            </label>
                                        </h4>
                                        <div class="input-checkset">
                                            <ul>
                                                <li v-for="item in group.items">
                                                    <label class="inputcheck">{{ item.name }}
                                                        <input v-model="store.data.permission_ids"
                                                               :checked="store.data.permission_ids.includes(item.id)"
                                                               :value="item.id"
                                                               type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </ApiData>
                    </a-card>
                </div>

            </a-form>
        </ApiStore>
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
