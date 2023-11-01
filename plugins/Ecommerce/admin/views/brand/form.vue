<script>function main(props) {
    let {Api, plugin, computed, h, compile, ref, reactive, currentRoute, router} = props;
    const self = this;
    Object.assign(this, props);
    this.closeDetail = function () {
        router.replace('/sales/order')
    }
}</script>

<template>

    <ApiStore :url="'/ecommerce/product/'+plugin.route.params.id" :params="{include:''}">
        <template #default="{store}">
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
                                    <a-form-item :rules="[{ required: true }]" label="Product Name" class="form-group">

                                        <a-input v-model:value="store.data.name" type="text"></a-input>
                                    </a-form-item>
                                </div>
                                <div>
                                    <a-form-item :rules="[{ required: true }]" label="Category" class="form-group" >
                                       <ApiSelect url="/ecommerce/category/all" v-model:value="store.data.category_id"></ApiSelect>
                                    </a-form-item>
                                </div>
                                <div>
                                    <a-form-item :rules="[{ required: true }]" label="Branch" class="form-group" >
                                       <ApiSelect url="/ecommerce/branch/all" v-model:value="store.data.branch_id"></ApiSelect>
                                    </a-form-item>
                                </div>
                                <div>
                                    <div class="form-group" data-select2-id="47">
                                        <label>Unit</label>
                                        <select class="select select2-hidden-accessible" data-select2-id="10"
                                                tabindex="-1"
                                                aria-hidden="true">
                                            <option data-select2-id="12">Choose Unit</option>
                                            <option data-select2-id="48">Unit</option>
                                        </select><span
                                        class="select2 select2-container select2-container--default select2-container--below"
                                        dir="ltr" data-select2-id="11" style="width: 100%;"><span
                                        class="selection"><span
                                        class="select2-selection select2-selection--single" role="combobox"
                                        aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                        aria-labelledby="select2-vrt4-container"><span
                                        class="select2-selection__rendered"
                                        id="select2-vrt4-container"
                                        role="textbox" aria-readonly="true"
                                        title="Choose Unit">Choose Unit</span><span
                                        class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                                                                           aria-hidden="true"></span></span>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label>SKU</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label>Minimum Qty</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="sm:col-span-2 lg:col-span-4">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group" data-select2-id="50">
                                        <label>Tax</label>
                                        <select class="select select2-hidden-accessible" data-select2-id="13"
                                                tabindex="-1"
                                                aria-hidden="true">
                                            <option data-select2-id="15">Choose Tax</option>
                                            <option data-select2-id="51">2%</option>
                                        </select><span
                                        class="select2 select2-container select2-container--default select2-container--below"
                                        dir="ltr" data-select2-id="14" style="width: 100%;"><span
                                        class="selection"><span
                                        class="select2-selection select2-selection--single" role="combobox"
                                        aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                        aria-labelledby="select2-3vjf-container"><span
                                        class="select2-selection__rendered"
                                        id="select2-3vjf-container"
                                        role="textbox" aria-readonly="true"
                                        title="Choose Tax">Choose Tax</span><span
                                        class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                                                                           aria-hidden="true"></span></span>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label>Discount Type</label>
                                        <select class="select select2-hidden-accessible" data-select2-id="16"
                                                tabindex="-1"
                                                aria-hidden="true">
                                            <option data-select2-id="18">Percentage</option>
                                            <option>10%</option>
                                            <option>20%</option>
                                        </select><span class="select2 select2-container select2-container--default"
                                                       dir="ltr" data-select2-id="17" style="width: 100%;"><span
                                        class="selection"><span class="select2-selection select2-selection--single"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false"
                                                                tabindex="0" aria-disabled="false"
                                                                aria-labelledby="select2-6h01-container"><span
                                        class="select2-selection__rendered" id="select2-6h01-container" role="textbox"
                                        aria-readonly="true" title="Percentage">Percentage</span><span
                                        class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                                                                           aria-hidden="true"></span></span>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label> Status</label>
                                        <select class="select select2-hidden-accessible" data-select2-id="19"
                                                tabindex="-1"
                                                aria-hidden="true">
                                            <option data-select2-id="21">Closed</option>
                                            <option>Open</option>
                                        </select><span class="select2 select2-container select2-container--default"
                                                       dir="ltr" data-select2-id="20" style="width: 100%;"><span
                                        class="selection"><span class="select2-selection select2-selection--single"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false"
                                                                tabindex="0" aria-disabled="false"
                                                                aria-labelledby="select2-qqj6-container"><span
                                        class="select2-selection__rendered" id="select2-qqj6-container" role="textbox"
                                        aria-readonly="true" title="Closed">Closed</span><span
                                        class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                                                                           aria-hidden="true"></span></span>
                                    </div>
                                </div>
                                <div class="sm:col-span-2 lg:col-span-4">
                                    <div class="form-group">
                                        <label> Product Image</label>
                                        <div class="image-upload">
                                            <input type="file">
                                            <div class="image-uploads">
                                                <img src="assets/img/icons/upload.svg" alt="img">
                                                <h4>Drag and drop a file to upload</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <a href="javascript:void(0);" class="btn btn-submit mr-2">Submit</a>
                                    <a href="productlist.html" class="btn btn-cancel">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a-form>
            </div>
        </template>

    </ApiStore>
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
