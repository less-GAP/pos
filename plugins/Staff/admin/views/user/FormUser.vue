<script>function main(props) {
    let {Api, plugin, computed, h, compile, ref, reactive, currentRoute, router} = props;
    const self = this;
    Object.assign(this, props);
    this.closeDetail = function () {
        router.replace('/staff/user')
    }
}</script>

<template>
    <a-drawer :closable="false" style="position:relative;display:flex;flex-direction:column;height:100vh;" :open="true"
              @close="closeDetail" width="500px">
        <ApiStore :url="'/staff/user/'+$route.params.id" :config="{autoload:$route.params.id=='new'?false:true}"
                  :params="{include:'customer,products'}" v-slot="{ store }">
            <a-form autocomplete="off" :loading="store.loading" autocomplete="off" v-bind="$config.formConfig"
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
                    <a-form-item name="username" label="UserName" :rules="[{ require: true }]">
                        <a-input autocomplete="off" v-model:value="store.data.username" autocomplete="off"
                                 :readonly="store.data.id && !$auth.hasPermission('User.updateUsername')"/>
                    </a-form-item>
                    <a-form-item name="full_name" label="Full Name" :rules="[{ required: true }]">
                        <a-input v-model:value="store.data.full_name"/>
                    </a-form-item>
                    <a-form-item name="email" label="Email" :rules="[{ type: 'email', required: true }]">
                        <a-input v-model:value="store.data.email"/>
                    </a-form-item>
                    <a-form-item label="Roles">
                        <ApiSelect mode="multiple" url="staff/role/all" labelKey="name" valueKey="id"
                                   :readonly="!$auth.hasPermission('user.updateRole')"
                                   v-model:value="store.data.roles_id">
                        </ApiSelect>
                    </a-form-item>

                    <a-form-item>
                        <label>
                            <a-checkbox v-model:checked="store.data.isDefaultSeller"></a-checkbox>
                            <span class="ml-4">Is default Seller</span>
                        </label>
                    </a-form-item>
                    <a-form-item label="Password"
                                 :rules="store.data.isNew ? [{ required: true, message: 'Please input your password!' }] : []">
                        <a-input-password v-model:value="store.data.password" autocomplete="off">
                            <template #prefix>
                                <LockOutlined class="site-form-item-icon"/>
                            </template>
                        </a-input-password>
                    </a-form-item>
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

.ant-drawer-body {
    padding: 0 !important
}
</style>
