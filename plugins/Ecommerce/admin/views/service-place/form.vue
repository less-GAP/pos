<script>function main(props) {
    let {Api, plugin, computed, h, compile, ref, reactive, currentRoute, router, modelManager} = props;
    const self = this;
    Object.assign(this, props);
    this.store = modelManager.model('taxonomy').find(currentRoute.value.params.id, {'filter[type]': 'service-place'}, {
        type: 'service-place'
    })
    this.backToList = function () {
        router.replace(plugin.url('/service-place'))
    }
}</script>

<template>
    <a-drawer :closable="false"
              style="position:relative;display:flex;flex-direction:column;height:100vh;" :open="true"
              @close="backToList" width="400px">
        <div class="content" data-select2-id="27">
            <div class="page-header">
                <div class="page-title">
                    <h4>Quản lý vị trí/ Phòng</h4>
                </div>
            </div>
            <a-form class="w-full h-full " layout="vertical" v-bind="$config.formConfig"
                    ref="formRef"
                    :model="store.data"
                    @finish="store.submitUpdate()">
                <div class="card" data-select2-id="26">
                    <div class="card-body" data-select2-id="25">
                        <a-form-item name="name" :rules="[{ required: true }]" label="Tên"
                                     class="form-group">
                            <a-input v-model:value="store.data.name" type="text"></a-input>
                        </a-form-item>

                        <div class="w-full">
                            <a-button html-type="submit" type="primary" class="btn btn-submit mr-2">Submit</a-button>
                            <a-button @click="backToList" class="btn btn-cancel">Cancel</a-button>
                        </div>
                    </div>
                </div>
            </a-form>
        </div>
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
