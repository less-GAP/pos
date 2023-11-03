<script setup>
import {ReloadOutlined} from "@ant-design/icons-vue";
import {ref, toRaw, watch} from "vue";
import {useAppStateStore} from "@/stores/appState";

const appState = useAppStateStore();
const emit = defineEmits(["register"]);

const props = defineProps({
  tableConfig: {
    type: Object,
    default: {},
  },
  pagination: {
    type: Object,
    default: {
      page: 1,
      total: 0,
      perPage: 20,
    },
  },
  showSizeChanger: {
    type: Boolean,
    default: true,
  },
  reloadVersion: {
    type: String,
    default: null,
  },
  showReload: {
    type: Boolean,
    default: true,
  },
  showSelection: {
    type: Boolean,
    default: true,
  },
  globalSearch: {
    type: Boolean,
    default: true,
  },
  showSort: {
    type: [Boolean, Array],
    default: false,
  },
  showPagination: {
    type: [Boolean],
    default: true,
  },
  params: {
    type: Object,
    default: {},
  },
  sort: {
    type: String,
    default: "-id",
  },
  filter: {
    type: Object,
    default: {},
  },
  columns: Array,
  selectionActions: {
    type: Array,
    default: [],
  },
  itemActions: {
    type: Array,
    default: [],
  },
  listActions: {
    type: Array,
    default: [],
  },
  api: Function,
  store: Object,
  addAction: Function,
});
const tableConfig = {
  item_key: "id",
  rowSelect: true,
  globalSearch: true,
  ...props.tableConfig,
};

const tableData = ref({});
const data = ref(null);
const filter = ref({
  search: "",
  ...props.filter,
});
const orderBy = ref(props.sort);

function getFilter() {
  let rs = {};
  for (let filterKey in filter.value) {
    rs["filter[" + filterKey + "]"] = filter.value[filterKey];
  }
  return rs;
}

function reload(showLoading = false) {
  if (showLoading) {
    loading.value = true;
  }
  props.store.fetch({
    perPage: props.pagination.perPage,
    sort: orderBy.value,
    page: props.pagination.page,
    ...props.params,
    ...getFilter(),
  }).then((rs) => {
    if (rs.data?.total) {
      props.pagination.total = rs.data?.total ? rs.data.total : 0;
    }
  })
    .finally(() => {
      checkAll.value = false;
      if (showLoading) {
        loading.value = false;
      }
    });
}

emit("register", {reload, filter});
const loading = ref(false);
const checkAll = ref(false);
const selectedItems = ref([]);

function toggleCheckAll() {
  if (checkAll.value) {
    selectedItems.value = toRaw(data.value || []);
  } else {
    selectedItems.value = [];
  }
}

const showAdvanceSearch = ref(false)
const toggleSearch = function () {
  showAdvanceSearch.value = !showAdvanceSearch.value
}
reload()
</script>

<template>
  <div class="card">
    <div class="card-body">
      <div class="table-top">
        <div class="search-set">
          <div v-if="$slots.advanceSearch" @click="toggleSearch" class="search-path">
            <a v-if="!showAdvanceSearch" class="btn btn-filter" id="filter_search">
              <img src="@/assets/img/icons/filter.svg" alt="img">
              <span><img src="@/assets/img/icons/closes.svg" alt="img"></span>
            </a>
            <a v-else class="btn btn-filter setclose">
              <span><img src="@/assets/img/icons/closes.svg" alt="img"></span>
            </a>
          </div>
          <a-form layout="inline">
            <a-space>
              <div><label>
                <a-input allow-clear @keyup.enter.native="reload"
                         v-model:value="filter.search"
                         placeholder="Search..."
                >
                  <template #prefix>
                    <img src="@/assets/img/icons/search-white.svg" alt="img">
                  </template>
                </a-input>
              </label>
              </div>
              <slot name="lineSearch" v-bind="{reload,filter,toggleSearch,loading}"></slot>
            </a-space>

          </a-form>
        </div>
        <div class="wordset">
          <slot name="listActions" v-bind="{selectedItems}"></slot>
        </div>
      </div>
      <div v-if="$slots.advanceSearch" :class="showAdvanceSearch?'!block':''" class="card relative" id="filter_inputs">
        <div class="card-body  top-0 !pb-0">
          <slot name="advanceSearch" v-bind="{reload,filter,toggleSearch,loading}"></slot>
        </div>
      </div>
      <div v-if="store.data?.data?.length" class="table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
          <a-table v-bind="$props" :dataSource="store.data.data"
                   :columns="columns.map(item=>{return {...item,dataIndex:item.key}}).concat({key:'action',width:100})"
                   :pagination="false"
                   class="table datanew dataTable no-footer" id="DataTables_Table_0" role="grid"
                   aria-describedby="DataTables_Table_0_info">
            <template #headerCell="{ column }">
              <slot :name="'header['+column.key+']'">
                {{ column.title }}
              </slot>
            </template>
            <template #bodyCell="{ column, record,index }">
              <template v-if="itemActions?.length && column.key=='action'">
                <template v-for="itemAction in itemActions">
                  <slot :name="'cellAction[' + itemAction.key + ']'" v-bind="{
                    item,
                    itemAction,
                    actionMethod() {
                      itemAction.action(record, reload);
                    },
                  }">
                    <a-popconfirm v-if="itemAction.confirm" title="Are you sure？"
                                  @confirm="itemAction.action(record, reload)">
                      <a-button type="link" class="dropdown-item" :class="itemAction.class
                          ? itemAction.class
                          : ''
                        ">
                        <template v-if="itemAction.icon" #icon>
                          <i :class="itemAction.icon" class="flex-none mr-2"/>
                        </template>
                        {{ itemAction.label }}
                      </a-button>
                    </a-popconfirm>
                    <a-button v-else class="dropdown-item" :class="itemAction.class
                        ? itemAction.class
                        : ''
                      " type="link" @click="itemAction.action(record, reload)">
                      <template v-if="itemAction.icon" #icon>
                        <i :class="itemAction.icon" class="flex-none mr-2"/>
                      </template>
                      {{ itemAction.label }}
                    </a-button>
                  </slot>
                </template>
              </template>
              <slot v-else :name="'cell[' + column.key + ']'" v-bind="{ item:record, column, index }">
                {{
                  $style["format"][column.key]
                    ? $style["format"][column.key]($format.getObjValue(record, column.key))
                    : $format.getObjValue(record, column.key)
                }}
              </slot>
            </template>

          </a-table>
          <a-pagination v-if="showPagination && store.data && pagination?.total > pagination.perPage"
                        v-model:current="pagination.page" v-model:pageSize="pagination.perPage" style="height: 40px"
                        class="pt-2 !mt-5"
                        :show-size-changer="showSizeChanger" :total="pagination.total" @change="reload">
            <template #itemRender="{ type, originalElement }">
              <a v-if="type === 'prev'">Previous</a>
              <a v-else-if="type === 'next'">Next</a>
              <component :is="originalElement" v-else></component>
            </template>
          </a-pagination>
        </div>
      </div>

    </div>
  </div>
</template>
<style scoped>
.item-actions > :not(:first-child) {
  margin-left: 10px;
}
</style>
