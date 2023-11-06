<script>function main(props) {
    let {Api, modelManager, plugin, computed, h, compile, ref, reactive, currentRoute, router} = props;
    const self = this;
    this.store = modelManager.model('place').find(currentRoute.value.params.id, {include: 'group'})
    Object.assign(this, props);
    this.closeDetail = function () {
        router.replace('/staff/place')
    }
}</script>

<template>
    <a-drawer :closable="false" style="position:relative;display:flex;flex-direction:column;height:100vh;" :open="true"
              @close="closeDetail" width="500px">
        <a-form :loading="store.loading" autocomplete="off" v-bind="$config.formConfig"
                :model="store.data"
                @finish="store.submitUpdate()"
                ref="formRef">

            <div class="p-3 bg-gray-200">
                <a-button class="!inline-flex items-center justify-center md:!hidden !w-8 !h-8 !p-0" type="text"
                          @click="closeDetail">
                    <template #icon>
                        <div class="fa fa-arrow-left">
                        </div>
                    </template>
                </a-button>
                <a-space class="float-right">
                    <a-button html-type="submit" type="primary" class="uppercase">
                        <template #icon>
                            <i class="fa fa-save mr-3"></i>
                        </template>
                        <span class="ml-1 text-white">Save</span>
                    </a-button>
                </a-space>
            </div>
            <div class="px-4 mt-5 overflow-y-auto" style="height:calc(100% - 60px);">
                <a-form-item name="name" label="Tên vị trí/phòng" :rules="[{ required: true }]">
                    <a-input autocomplete="off" v-model:value="store.data.name" autocomplete="off"/>
                </a-form-item>
                <a-form-item name="group_id" label="Group" >
                    <ApiSelect placeholder="Group" url="/model/place_group/all"
                               labelKey="name" valueKey="id"
                               v-model:value="store.data.group_id">
                        <template #create="{fetch,hideModal,setValue}">
                            <PluginView @close="hideModal"
                                        @created="result=>{hideModal();fetch();setValue(result.id)}"
                                        pluginName="staff"
                                        view="/place_group/QuickCreateForm.vue"/>
                        </template>
                    </ApiSelect>
                </a-form-item>
                <a-form-item name="order" label="Thứ tự">
                    <a-input v-model:value="store.data.order"/>
                </a-form-item>
                <a-form-item name="description" label="Mô tả">
                    <a-textarea v-model:value="store.data.description"/>
                </a-form-item>


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

.ant-drawer-body {
    padding: 0 !important
}
</style>
