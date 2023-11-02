<script setup>
import {ref} from "vue";
import {DataTable} from "@/components";
import router from "@/router";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {UseDataTable} from "@/utils/UseDataTable";

const routePrefix = 'sales/order' // register api prefix in Admin/routes.php
const reloadVersion = 'sales_orders' // table name for check live reload
const {
  getListApi,
  createApi,
  deleteApi,
  updateApi
} = UseEloquentRouter(routePrefix, {
  include: 'products,customer'
})
const isShowModal = ref(false)

const itemActions = [
  {
    label: 'Sale Detail',
    icon: 'fa fa-eye',
    action: (item, reload) => {
      //showEditUser({}, reload)
      router.replace(routePrefix + '/' + item.id + '/detail')
    }
  },
  {
    label: 'Edit',
    icon: 'fa fa-edit',
    action: (item, reload) => {
      //showEditUser({}, reload)
      router.replace(routePrefix + '/' + item.id)
    }
  },
  {
    label: 'Delete',
    icon: 'fa fa-trash',
    class: 'font-medium !text-red-600 dark:!text-red-500 hover:underline',
    action(item, reload) {
      deleteApi(item.id).then(rs => {
      }).finally(() => {
        reload();
      });
    }
  }
]
const columns = [
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

const tableConfig = UseDataTable(getListApi, {
  columns,
  reloadVersion,
  itemActions
})

</script>

<template>
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Sales List</h4>
          <h6>Manage your sales</h6>
        </div>
        <div class="page-btn">
          <a href="add-sales.html" class="btn btn-added"><img src="@/assets/img/icons/plus.svg" alt="img" class="mr-1">Add
            Sales</a>
        </div>
      </div>
      <DataTable v-bind="tableConfig">
        <template #advanceSearch="{reload,filter,toggleSearch}">
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
                <select v-model="filter.status" class="select select2-hidden-accessible" data-select2-id="1"
                        tabindex="-1" aria-hidden="true">
                  <option data-select2-id="3">Completed</option>
                  <option>Paid</option>
                </select>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="form-group">
                <a @click="reload" class="btn btn-filters ml-auto"><img src="@/assets/img/icons/search-whites.svg"
                                                                        alt="img"></a>
              </div>
            </div>
          </div>
        </template>
        <template #cell[order_status]="{ item, column, index }">
          <span v-if="item.order_status=='success'" class="badges bg-lightgreen">{{ item.order_status }}</span>
          <span v-if="item.order_status=='pending'" class="badges bg-yellow-500">{{ item.order_status }}</span>
          <span v-if="item.order_status=='cancel'" class="badges bg-red-500">{{ item.order_status }}</span>
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
