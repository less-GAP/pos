<script>function main(props) {
    let {Api, plugin, computed, h, compile, ref, reactive, currentRoute, router} = props;
    const self = this;
    Object.assign(this, props);
    this.closeDetail = function () {
        router.replace('/staff/role')
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
                    @finish="store.submitUpdate()">
                <a-card body-style="padding:10px;height:55px;"
                        class="bg-gray-50  ">
                    <a-button class="float-left" type="link" @click="closeDetail">
                        <template #icon>
                            <ArrowLeftOutlined/>
                        </template>
                    </a-button>
                    <a-space class="float-right" align="right">
                        <!--                <a-button v-if="store.data.rule_detect_category_link" @click="detectCategory" :loading="loadingDraft" >Test Category</a-button>-->
                        <a-button v-if="!store.data.id" html-type="submit" :loading="loading" type="primary">Create
                        </a-button>
                        <a-button v-else html-type="submit" :loading="loading" type="primary" class="!bg-yellow-400">
                            Update
                        </a-button>
                    </a-space>
                </a-card>
                <div style="height:calc(100% - 70px);margin-top:15px;overflow: auto;padding:0;" :gutter="20">
                    <a-card>
                        <a-form-item label="Name"
                                     name="name"
                                     :rules="[{ required: true }]"
                        >
                            <a-input v-model:value="store.data.name" placeholder="Name.."/>
                        </a-form-item>
                        <a-form-item label="Description"
                                     name="description"
                                     :min="0"
                                     :rules="[{ required: true }]"
                        >
                            <a-textarea rows="5" v-model:value="store.data.description"/>
                        </a-form-item>

                        <a-form-item label="Status"
                                     name="status"
                                     :rules="[{ required: true }]"
                        >
                            <a-switch checkedValue="active" unCheckedValue="inactive"
                                      v-model:checked="store.data.status"/>
                        </a-form-item>

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
