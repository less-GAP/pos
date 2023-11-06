<script>function main(props) {
    let {Api, plugin, computed, h, compile, ref, reactive, currentRoute, router, modelManager} = props;
    const self = this;
    Object.assign(this, props);
    this.store = modelManager.model('product').find(currentRoute.value.params.id, {include: 'images,variants,places'}, {
        type: 'product',
        images: [],
        variants: [],
        places: [],
    })
    this.backToList = function () {
        router.replace(plugin.url('/product'))
    }
}</script>

<template>

    <a-drawer :closable="false"
              style="position:relative;display:flex;flex-direction:column;height:100vh;" :open="true"
              @close="backToList" width="80vw">
        <a-form class="w-full h-full p-0 "
                v-bind="{...$config.formConfig,layout:'horizontal',labelAlign:'left',labelCol:{ style: { width: '200px' } }}"
                ref="formRef"
                :model="store.data"
                @finish="store.submitUpdate()">
            <div style="height: 30px" class="flex justify-between items-center">
                <h3>Thêm sản phẩm</h3>
                <a-space>
                    <a-button @click="backToList" class="uppercase mr-5">
                        <template #icon>
                            <i class="fa fa-arrow-left mr-3"></i>
                        </template>
                        Quay lại
                    </a-button>
                    <a-button html-type="submit" type="primary" class="uppercase">
                        <template #icon>
                            <i class="fa fa-save mr-3"></i>
                        </template>
                        <span class="ml-1 text-white">Save</span>
                    </a-button>
                </a-space>
            </div>
            <a-divider></a-divider>
            <div style="height: calc(100% - 60px);">
                <a-tabs>
                    <a-tab-pane key="1" tab="Thông tin">
                        <a-card style="background: #eee">
                            <a-row :gutter="50">
                                <a-col :span="14">
                                    <a-form-item name="sku" :rules="[{required:true}]">
                                        <template #label>
                                            <a-space>
                                                Mã sản phẩm
                                                <a-popover>
                                                    <template #content>
                                                        Mã sản phẩm được tạo tự động hoặc nhập vào
                                                    </template>
                                                    <i class="fa fa-info-circle"></i>
                                                </a-popover>
                                            </a-space>
                                        </template>
                                        <a-input style="width: 100%" v-model:value="store.data.sku"></a-input>

                                    </a-form-item>

                                    <a-form-item name="name" :rules="[{required:true}]" label="Tên sản phẩm">
                                        <a-input v-model:value="store.data.name"></a-input>
                                    </a-form-item>
                                    <a-form-item label="Nhóm sản phẩm">
                                        <ApiSelect labelKey="name" valueKey="id" url="/model/taxonomy/all"
                                                   v-model:value="store.data.category_id"
                                                   :params="{'filter[type]':'product_category'}">
                                            <template #create="{fetch,hideModal,setValue}">
                                                <PluginView @close="hideModal"
                                                            @created="result=>{hideModal();fetch();setValue(result.id)}"
                                                            pluginName="ecommerce"
                                                            type="product_category"
                                                            view="/taxonomy/QuickCreateForm.vue"/>
                                            </template>
                                        </ApiSelect>
                                    </a-form-item>
                                    <a-form-item>
                                        <template #label>
                                            <a-space>
                                                Vị trí
                                                <a-popover>
                                                    <template #content>
                                                        Vị trí hàng hóa được cất giữ. Ví dụ tủ lạnh, bếp...
                                                    </template>
                                                    <i class="fa fa-info-circle"></i>

                                                </a-popover>
                                            </a-space>
                                        </template>
                                        <ApiSelectObject mode="multiple" labelKey="name" valueKey="id"
                                                   url="/model/taxonomy/all"
                                                   v-model:value="store.data.places"
                                                   :params="{'filter[type]':'product_place'}">
                                            <template #create="{fetch,hideModal,setValue}">
                                                <PluginView @close="hideModal"
                                                            @created="result=>{hideModal();fetch();setValue(result.id)}"
                                                            pluginName="ecommerce"
                                                            title="Thêm Vị Trí"
                                                            type="product_place"
                                                            view="/taxonomy/QuickCreateForm.vue"/>
                                            </template>
                                        </ApiSelectObject>
                                    </a-form-item>
                                </a-col>
                                <a-col :span="10">
                                    <a-form-item name="cost_price" :rules="[{required:true}]">
                                        <template #label>
                                            <a-space>
                                                Giá vốn
                                                <a-popover>
                                                    <template #content>
                                                        Dùng để tính lợi nhuận
                                                    </template>
                                                    <i class="fa fa-info-circle"></i>
                                                </a-popover>
                                            </a-space>
                                        </template>
                                        <InputMoney v-model:value="store.data.cost_price"></InputMoney>
                                    </a-form-item>
                                    <a-form-item name="sell_price" :rules="[{required:true}]">
                                        <template #label>
                                            <a-space>
                                                Giá bán
                                                <a-popover>
                                                    <template #content>
                                                        Dùng để tính lợi nhuận
                                                    </template>
                                                    <i class="fa fa-info-circle"></i>
                                                </a-popover>
                                            </a-space>
                                        </template>
                                        <InputMoney v-model:value="store.data.sell_price"></InputMoney>
                                    </a-form-item>
                                    <a-form-item name="unit" :rules="[{ required: true }]" label="Đơn vị"
                                                 class="form-group">
                                        <ApiSelect labelKey="name" valueKey="name" url="/model/taxonomy/all"
                                                   :params="{'filter[type]':'product_unit'}"
                                                   v-model:value="store.data.unit">
                                            <template #create="{fetch,hideModal,setValue}">
                                                <PluginView @close="hideModal"
                                                            @created="result=>{hideModal();fetch();setValue(result.name)}"
                                                            pluginName="ecommerce"
                                                            type="product_unit"
                                                            title="Tạo đơn vị"
                                                            view="/taxonomy/QuickCreateForm.vue"/>
                                            </template>
                                        </ApiSelect>
                                    </a-form-item>
                                    <a-form-item name="stock" :rules="[{required:true}]">
                                        <template #label>
                                            <a-space>
                                                Tồn kho
                                                <a-popover>
                                                    <template #content>
                                                        Dùng để tính lợi nhuận
                                                    </template>
                                                    <i class="fa fa-info-circle"></i>
                                                </a-popover>
                                            </a-space>
                                        </template>
                                        <a-input-number v-model:value="store.data.stock"></a-input-number>
                                    </a-form-item>
                                </a-col>
                            </a-row>
                            <a-row>
                                <a-form-item label="Hình ảnh">
                                    <InputUpload :multiple="true" v-model:value="store.data.images"></InputUpload>
                                </a-form-item>
                            </a-row>
                        </a-card>
                    </a-tab-pane>
                    <a-tab-pane key="2" tab="Mô tả chi tiết">
                        <a-card style="background: #eee">
                            <div class="mb-5">
                                Thuộc tính (Màu sắc, Kích thước...)
                            </div>
                            <div class="flex justify-items-start" v-for="(attribute,index) in store.data.variants">
                                <a-form-item>
                                    <a-space>
                                        <div style="width:200px">
                                            <ApiSelect
                                                :disableValues="store.data.variants.map(value=>value.name)"
                                                labelKey="name" valueKey="name" url="/model/taxonomy/all"
                                                v-model:value="attribute.name"
                                                :params="{'filter[type]':'product_variant'}">
                                                <template #create="{fetch,hideModal,setValue}">
                                                    <PluginView @close="hideModal"
                                                                @created="result=>{hideModal();fetch();setValue(result.id)}"
                                                                pluginName="ecommerce"
                                                                title="Thêm thuộc tính"
                                                                type="product_variant"
                                                                view="/taxonomy/QuickCreateForm.vue"/>
                                                </template>
                                            </ApiSelect>
                                        </div>

                                        <!--                                <ApiSelect v-if="attribute.taxonomy_id" labelKey="name" valueKey="id"-->
                                        <!--                                           url="/model/taxonomy/all"-->
                                        <!--                                           v-model:value="attribute.value"-->
                                        <!--                                           :params="{'filter[type]':'product_variant_value_'+attribute.taxonomy_id}">-->
                                        <!--                                    <template #create="{fetch,hideModal,setValue}">-->
                                        <!--                                        <PluginView @close="hideModal"-->
                                        <!--                                                    @created="result=>{hideModal();fetch();setValue(result.id)}"-->
                                        <!--                                                    pluginName="ecommerce"-->
                                        <!--                                                    title="Thêm thuộc tính"-->
                                        <!--                                                    :type="'product_variant_value_'+attribute.taxonomy_id"-->
                                        <!--                                                    view="/taxonomy/QuickCreateForm.vue"/>-->
                                        <!--                                    </template>-->
                                        <!--                                </ApiSelect>-->
                                        <a-input style="width:200px" v-model:value="attribute.value"></a-input>
                                        <a-popconfirm
                                            title="Are you sure?"
                                            ok-text="Yes"
                                            cancel-text="No"
                                            @confirm="store.data.variants.splice(index,1)"
                                        >
                                            <a-button
                                                type="text" danger>
                                                <i class="fa fa-trash"></i>
                                            </a-button>
                                        </a-popconfirm>
                                    </a-space>

                                </a-form-item>

                                <a-form-item style="width: 200px;margin-right:20px">

                                </a-form-item>

                            </div>
                            <a-button @click="store.data.variants.push({})">
                                <i class="fa fa-plus mr-3"></i>
                                Thêm thuộc tính
                            </a-button>
                        </a-card>
                        <a-card class="!mt-5" style="background: #eee">
                            <a-form-item label="Mô tả">
                                <a-textarea v-model:value="store.data.description"></a-textarea>
                            </a-form-item>
                        </a-card>
                        <a-card class="!mt-5" style="background: #eee">
                            <a-form-item label="   Ghi chú">
                                <a-textarea v-model:value="store.data.note"></a-textarea>
                            </a-form-item>
                        </a-card>

                    </a-tab-pane>


                </a-tabs>
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
