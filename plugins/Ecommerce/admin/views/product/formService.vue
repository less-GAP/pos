<script>

function main(props) {
    let {Api, plugin, computed, h, compile, ref, reactive, currentRoute, router, modelManager} = props;
    const self = this;
    Object.assign(this, props);
    this.store = modelManager.model('product').find(currentRoute.value.params.id, {include: 'images,places,cost_items,cost_items.images'}, {
        type: 'service',
        cost_items: [],
        images: [],
        places: [],
    })
    this.backToList = function () {
        router.replace(plugin.url('/product'))
    }
    this.getTotal = function (items, key) {
        let total = 0
        items.map(item => {
            total += parseFloat(item[key]) * parseInt(item.pivot.quantity)
        })
        return total
    }
}


</script>

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
                                                Mã dịch vụ
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

                                    <a-form-item name="name" :rules="[{required:true}]" label="Tên dịch vụ">
                                        <a-input v-model:value="store.data.name"></a-input>
                                    </a-form-item>
                                    <a-form-item name="name" :rules="[{required:true}]" label="Thời lượng">
                                        <a-space>

                                            <a-input-number :min="0"
                                                            v-model:value="store.data.quantity"></a-input-number>
                                            <ApiSelect style="width:100px" labelKey="name" valueKey="name"
                                                       url="/model/taxonomy/all"
                                                       :params="{'filter[type]':'service_unit'}"
                                                       v-model:value="store.data.unit">
                                                <template #create="{fetch,hideModal,setValue}">
                                                    <PluginView @close="hideModal"
                                                                @created="result=>{hideModal();fetch();setValue(result.name)}"
                                                                pluginName="ecommerce"
                                                                type="service_unit"
                                                                title="Tạo đơn vị"
                                                                view="/taxonomy/QuickCreateForm.vue"/>
                                                </template>
                                            </ApiSelect>
                                        </a-space>

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
                                                         :params="{'filter[type]':'service-place'}">
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

                                </a-col>
                            </a-row>
                            <a-row>
                                <a-form-item label="Hình ảnh">
                                    <InputUpload :multiple="true" v-model:value="store.data.images"></InputUpload>
                                </a-form-item>
                            </a-row>
                        </a-card>
                    </a-tab-pane>
                    <a-tab-pane key="2" tab="Nguyên liệu tiêu hao">
                        <a-form-item>
                            <template #label>
                                <a-space>
                                    Nguyên liệu tiêu hao
                                    <a-popover>
                                        <template #content>
                                            Vị trí hàng hóa được cất giữ. Ví dụ tủ lạnh, bếp...
                                        </template>
                                        <i class="fa fa-info-circle"></i>

                                    </a-popover>
                                </a-space>
                            </template>
                            <ApiSelectObject
                                mode="multiple"
                                :transformOption="(option)=>{
                                    return {
                                        pivot:{
                                             item_id:option.id,
                                             quantity:1

                                        },...option
                                    }
                                }"
                                mode="multiple" labelKey="name" valueKey="id" selectValueKey="item_id"
                                url="/model/product/all"
                                v-model:value="store.data.cost_items"
                                :params="{'filter[type]':'product','include':'images'}">
                            </ApiSelectObject>
                        </a-form-item>
                        <a-table
                            v-if="store.data.cost_items.length"
                            :pagination="false"
                            :columns=" [{title: 'Hình ảnh',width:100,dataIndex: 'images'}
                            , {title: 'Tên',dataIndex: 'name'}
                            ,{title: 'Mã',dataIndex: 'sku'}
                            ,{title: 'Số lương',dataIndex: 'quantity',width:100}
                            ,{title: 'Giá vốn',dataIndex: 'cost_price',width:200}
                            ,{title: 'Thành tiền',dataIndex: 'total_price',width:200}
                            ]"
                            :data-source="store.data.cost_items" bordered>
                            <template #bodyCell="{record,column}">
                                <template v-if="column.dataIndex === 'images'">
                                    <a-image
                                        v-if="record.images?.length"
                                        :preview="{ visible: record.visible }"
                                        :width="100"
                                        :src="record.images[0].file_url"
                                        @click="record.visible = true"
                                    />
                                    <div style="display: none">
                                        <a-image-preview-group
                                            :preview="{ visible:record.visible, onVisibleChange: vis => (record.visible = vis) }">
                                            <a-image
                                                :style="{width:'50px',height:'50px'}"
                                                v-for="image in record.images"
                                                :src="image.file_url"
                                            />
                                        </a-image-preview-group>
                                    </div>
                                </template>
                                <template v-if="column.dataIndex === 'quantity'">
                                    <a-input-number :min="1" v-model:value="record.pivot.quantity"></a-input-number>
                                </template>
                                <template v-if="column.dataIndex === 'name'">
                                    {{ record.name }}
                                </template>
                                <template v-if="column.dataIndex === 'sku'">
                                    {{ record.sku }}
                                </template>
                                <template v-if="column.dataIndex === 'cost_price'">
                                    {{ $format.formatMoney(record.cost_price) }}
                                </template>
                                <template v-if="column.dataIndex === 'total_price'">
                                    {{ $format.formatMoney(record.cost_price * record.pivot.quantity) }}
                                </template>
                            </template>
                            <template #summary>
                                <a-table-summary fixed>
                                    <a-table-summary-row>
                                        <a-table-summary-cell class="text-right" :col-span="4"><b>Tổng giá vốn nguyên
                                            liệu</b></a-table-summary-cell>
                                        <a-table-summary-cell :col-span="2">
                                            {{ $format.formatMoney(getTotal(store.data.cost_items, 'cost_price')) }}
                                        </a-table-summary-cell>
                                    </a-table-summary-row>
                                    <a-table-summary-row>
                                        <a-table-summary-cell class="text-right" :col-span="4"><b>Tổng giá bán nguyên
                                            liệu</b></a-table-summary-cell>
                                        <a-table-summary-cell :col-span="2">
                                            {{ $format.formatMoney(getTotal(store.data.cost_items, 'sell_price')) }}
                                        </a-table-summary-cell>
                                    </a-table-summary-row>
                                </a-table-summary>
                            </template>
                        </a-table>
                    </a-tab-pane>
                    <a-tab-pane key="3" tab="Mô tả chi tiết">
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
