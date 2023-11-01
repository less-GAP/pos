<script>function main(props) {
    let {Api, plugin, computed, h, compile, ref, reactive, currentRoute, router, modelManager} = props;
    const self = this;
    Object.assign(this, props);
    this.store = modelManager.model('product').find(currentRoute.value.params.id, {include: 'images'})
    this.closeDetail = function () {
        router.replace(plugin.url('/product'))
    }
}</script>

<template>
    <div class="content" data-select2-id="27">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Add</h4>
                <h6>Create new product</h6>
            </div>
        </div>
        <a-form class="w-full h-full " layout="vertical" v-bind="$config.formConfig"
                ref="formRef"
                :model="store.data"
                @finish="store.submitUpdate()">
            <div class="card" data-select2-id="26">
                <div class="card-body" data-select2-id="25">
                    <div class="sm:grid sm:grid-cols-2 lg:grid-cols-4 gap-x-6" data-select2-id="24">
                        <div>
                            <a-form-item name="name" :rules="[{ required: true }]" label="Product Name"
                                         class="form-group">

                                <a-input v-model:value="store.data.name" type="text"></a-input>
                            </a-form-item>
                        </div>
                        <div>
                            <a-form-item name="category_id" :rules="[{ required: true }]" label="Category"
                                         class="form-group">
                                <ApiSelect labelKey="name" valueKey="id" url="/model/category/all"
                                           v-model:value="store.data.category_id">
                                    <template #create="{fetch,hideModal,setValue}">
                                        <PluginView @close="hideModal"
                                                    @created="result=>{hideModal();fetch();setValue(result.id)}"
                                                    pluginName="ecommerce"
                                                    view="/category/QuickCreateForm.vue"/>
                                    </template>
                                </ApiSelect>
                            </a-form-item>
                        </div>
                        <div>
                            <a-form-item name="brand_id" :rules="[{ required: true }]" label="Brand"
                                         class="form-group">
                                <ApiSelect labelKey="name" valueKey="id" url="/model/brand/all"
                                           v-model:value="store.data.brand_id">
                                    <template #create="{fetch,hideModal,setValue}">
                                        <PluginView @close="hideModal"
                                                    @created="result=>{hideModal();fetch();setValue(result.id)}"
                                                    pluginName="ecommerce"
                                                    view="/brand/QuickCreateForm.vue"/>
                                    </template>
                                </ApiSelect>
                            </a-form-item>
                        </div>
                        <a-form-item name="unit_id" label="Unit" class="form-group">
                            <ApiSelect labelKey="name" valueKey="name" url="/model/unit/all"
                                       v-model:value="store.data.unit_id">
                            </ApiSelect>
                        </a-form-item>
                        <a-form-item name="sku" :rules="[{ required: true }]" label="SKU" class="form-group">
                            <a-input v-model:value="store.data.sku" type="text"/>
                        </a-form-item>
                        <a-form-item :rules="[{ required: true }]" name="price" label="Price" class="form-group">
                            <a-input-number v-model:value="store.data.price"/>
                        </a-form-item>

                        <div class="sm:col-span-2 lg:col-span-4">
                            <div class="form-group">
                                <label>Description</label>
                                <a-textarea v-model:value="store.data.description" class="form-control"></a-textarea>
                            </div>
                        </div>


                        <div class="sm:col-span-2 lg:col-span-4">
                            <div class="form-group">
                                <label> Product Image</label>
                                <div class="image-upload">
                                    <InputUpload multiple="true" v-model:value="store.data.images"></InputUpload>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <a-button html-type="submit" type="primary" class="btn btn-submit mr-2">Submit</a-button>
                            <a href="productlist.html" class="btn btn-cancel">Cancel</a>
                        </div>
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
