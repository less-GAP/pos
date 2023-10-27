<script>
function main(props) {
    let {Api, plugin, computed, component, h, compile, ref, reactive, currentRoute, router} = props
    Object.assign(this, props)
    this.prefix = '/sales/order'
    const self = this
    this.tableConfig = {
        params: {include: 'customer'},
        columns: [
            {
                title: 'Customer Type',
                key: 'customer.type',
                width: '100px'
            },
            {
                title: 'Customer Name',
                key: 'customer.name',

            },
            {
                title: 'Order Code',
                key: 'order_code',

            },

            {
                title: 'Status',
                key: 'order_status',
                width: 100
            },

            {
                title: 'Payment Status',
                key: 'payment_status',
                width: 100

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
                <h4>Order List</h4>
                <h6>Manage your sales</h6>
            </div>
            <div class="page-btn">

                <router-link :to="plugin.url('/order/new')" class="btn btn-added"><img
                    :src="plugin?.assets('/img/icons/plus.svg')"
                    alt="img"
                    class="mr-1">Add
                    Order
                </router-link>
            </div>
        </div>
        <ApiStore @load="loadStore" url="/sales/order/list" :config="{autoload:false}">
            <template #default="{store}">
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
            </template>
        </ApiStore>

    </div>
</template>
