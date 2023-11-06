<script>

function main(props) {
    let {Api, plugin, computed, component, h, compile, ref, reactive, currentRoute, modelManager, router} = props
    Object.assign(this, props)
    this.prefix = '/ecommerce/product'
    const routePrefix = this.prefix
    const self = this
    this.store = modelManager.model('product').paginate({include: 'images'})
    const itemActions = [
        {
            label: 'Edit Product',
            icon: 'fa fa-edit',
            action: (item, reload) => {
                //showEditUser({}, reload)
                if (item.type == 'product') {
                    router.replace(routePrefix + '/' + item.id)
                } else {
                    router.replace('/ecommerce/service/' + item.id)
                }
            }
        },
        // {
        //     label: 'Edit',
        //     icon: 'fa fa-edit',
        //     action: (item, reload) => {
        //         //showEditUser({}, reload)
        //         router.replace(routePrefix + '/' + item.id)
        //     }
        // },
        {
            label: 'Delete',
            icon: 'fa fa-trash',
            confirm: true,
            class: 'font-medium !text-red-600 dark:!text-red-500 hover:underline',
            action(item, reload) {
                Api.delete(self.prefix + '/' + item.id).then(rs => {
                }).finally(() => {
                    reload();
                });
            }
        }
    ]
    this.tableConfig = {
        itemActions,
        columns: [
            {
                title: 'Hình ảnh',
                key: 'images',
                width: '100px'
            },
            {
                title: 'Tên sản phẩm',
                key: 'name',
                width: '100px'
            },
            {
                title: 'Loại sản phẩm',
                key: 'type',
                render(item) {
                    if (item.type == 'product') {
                        return 'Sản Phẩm'
                    }
                    return 'Dịch vụ'

                },
                width: '150px'
            },
            {
                title: 'Giá bán',
                key: 'sell_price',

            },
            {
                title: 'sku',
                key: 'sku',

            },

            {
                title: 'Created at',
                key: 'created_at',
                width: 200
            },
        ]
    }
}

</script>

<template>

    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Quản lý hàng hóa</h4>
            </div>
            <div class="page-btn">
                <a-dropdown>
                    <template #overlay>
                        <a-menu @click="handleMenuClick">
                            <a-menu-item key="1">
                                <router-link :to="plugin.url('/product/new')" class="btn btn-added">
                                    Sản phẩm
                                </router-link>
                            </a-menu-item>
                            <a-menu-item key="2">
                                <router-link :to="plugin.url('/service/new')" class="btn btn-added">
                                    Dịch vụ
                                </router-link>
                            </a-menu-item>
                            <a-menu-item key="3">
                                <router-link :to="plugin.url('/product/new')" class="btn btn-added">
                                    Gói Dịch Vụ
                                </router-link>
                            </a-menu-item>
                            <a-menu-item key="3">
                                <router-link :to="plugin.url('/product/new')" class="btn btn-added">
                                    Thẻ tài khoản
                                </router-link>
                            </a-menu-item>
                        </a-menu>
                    </template>
                    <a-button type="primary" ghost>
                        <i class="ml-3 fa fa-plus mr-3"/>
                        Thêm mới
                    </a-button>
                </a-dropdown>

            </div>
        </div>

        <DataTable v-bind="tableConfig" :store="store">
            <template #lineSearch>
                <a-select allow-clear style="width:200px" @change="store.fetch" placeholder="Loại sản phẩm"
                          v-model:value="store.params['filter[type]']">
                    <a-select-option value="product">Sản Phẩm</a-select-option>
                    <a-select-option value="product_package">Gói Sản Phẩm</a-select-option>
                    <a-select-option value="service">Dịch Vụ</a-select-option>
                    <a-select-option value="service_package">Gói Dịch Vụ</a-select-option>
                    <a-select-option value="membership">Thẻ Tài Khoản</a-select-option>
                </a-select>
            </template>
            <template #listActions="{selectedItems}">
                <ul>
                    <li>
                        <a title="pdf"><img
                            :src="plugin?.assets('/img/icons/pdf.svg')" alt="img"></a>
                    </li>
                    <li>
                        <a title="excel"><img
                            :src="plugin?.assets('/img/icons/excel.svg')" alt="img"></a>
                    </li>
                    <li>
                        <a title="print"><img
                            :src="plugin?.assets('/img/icons/printer.svg')" alt="img"></a>
                    </li>
                </ul>
            </template>
            <template #cell[order_status]="{ item, column, index }">
                        <span v-if="item.order_status=='success'" class="badges bg-lightgreen">{{
                                item.order_status
                            }}</span>
                <span v-if="item.order_status=='pending'" class="badges bg-yellow-500">{{
                        item.order_status
                    }}</span>
                <span v-if="item.order_status=='cancel'" class="badges bg-red-500">{{
                        item.order_status
                    }}</span>
            </template>
            <template #cell[payment_status]="{ item, column, index }">
                <span class="badges bg-lightgreen">{{ item.payment_status }}</span>
            </template>
            <template #cell[customer.type]="{ item, column, index }">
                {{ item.customer?.type }}
            </template>
            <template #cell[customer.name]="{ item, column, index }">
                {{ item.customer?.name }}
            </template>
            <template #cell[images]="{item,column}">
                <a-image
                    v-if="item.images?.length"
                    :preview="{ visible: item.visible }"
                    :width="100"
                    :src="item.images[0].file_url"
                    @click="item.visible = true"
                />
                <div style="display: none">
                    <a-image-preview-group
                        :preview="{ visible:item.visible, onVisibleChange: vis => (item.visible = vis) }">
                        <a-image
                            :style="{width:'50px',height:'50px'}"
                            v-for="image in item.images"
                            :src="image.file_url"
                        />
                    </a-image-preview-group>
                </div>
            </template>
        </DataTable>


    </div>
</template>
