<script>function main(props) {
    let {Api, plugin, computed, h, compile, ref, reactive, currentRoute, router, modelManager} = props;
    const self = this;
    Object.assign(this, props);
    this.store = modelManager.model('category').find(currentRoute.value.params.id, {})
    this.backToList = function () {
        router.replace(plugin.url('/category'))
    }
}</script>

<template>
    <div class="content" data-select2-id="27">
        <div class="page-header">
            <div class="page-title">
                <h4>Category</h4>
                <h6>Create new category</h6>
            </div>
        </div>
        <a-form class="w-full h-full " layout="vertical" v-bind="$config.formConfig"
                ref="formRef"
                :model="store.data"
                @finish="store.submitUpdate()">
            <div class="card" data-select2-id="26">
                <div class="card-body" data-select2-id="25">
                    <div class="sm:grid sm:grid-cols-2 lg:grid-cols-4 gap-x-6" data-select2-id="24">
                        <a-form-item name="name" :rules="[{ required: true }]" label="Category Name"
                                     class="form-group">

                            <a-input v-model:value="store.data.name" type="text"></a-input>
                        </a-form-item>


                    </div>
                    <div class="w-full">
                        <a-button html-type="submit" type="primary" class="btn btn-submit mr-2">Submit</a-button>
                        <a-button @click="backToList" class="btn btn-cancel">Cancel</a-button>
                    </div>
                </div>
            </div>
        </a-form>
    </div>
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
