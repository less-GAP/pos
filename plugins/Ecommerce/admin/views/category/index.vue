<script>

function main(props) {
    let {Api, plugin, computed, component, h, compile, ref, reactive, currentRoute, modelManager, router} = props
    Object.assign(this, props)
    this.prefix = '/ecommerce/category'
    const routePrefix = this.prefix
    const self = this
    this.store = modelManager.model('category').paginate({})
    const itemActions = [
        {
            label: 'Edit Category',
            icon: 'fa fa-edit',
            action: (item, reload) => {
                //showEditUser({}, reload)
                router.replace(routePrefix + '/' + item.id )
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
                title: 'Name',
                key: 'name',
                width: '100px'
            },
            {
                title: 'Price',
                key: 'price',

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
                <h4>Category</h4>
                <h6>Manage your categories</h6>
            </div>
            <div class="page-btn">

                <router-link :to="plugin.url('/category/new')" class="btn btn-added"><img
                    :src="plugin?.assets('/img/icons/plus.svg')"
                    alt="img"
                    class="mr-1">Add
                    Category
                </router-link>
            </div>
        </div>

        <DataTable v-bind="tableConfig" :store="store">
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
            <template #advanceSearch="{reload,filter,toggleSearch,loading}">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <input v-model="filter.name" type="text" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <input v-model="filter.ref_no" type="text" placeholder="Enter Reference No">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <select v-model="filter.status" class="select select2-hidden-accessible"
                                    data-select2-id="1"
                                    tabindex="-1" aria-hidden="true">
                                <option data-select2-id="3">Completed</option>
                                <option>Paid</option>
                            </select>

                        </div>

                    </div>
                    <a-space class="form-group">
                        <a-button outline @click="toggleSearch">
                            Close
                        </a-button>
                        <a-button :loading="loading" type="primary" @click="reload">
                            <template #icon>
                                <i class="fa fa-search mr-3"></i>
                            </template>
                            Filter
                        </a-button>
                    </a-space>
                </div>
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
        </DataTable>


    </div>
</template>
