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
    default: false,
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
  if (props.api) {
    if (showLoading) {
      loading.value = true;
    }
    props
      .api({
        perPage: props.pagination.perPage,
        sort: orderBy.value,
        page: props.pagination.page,
        ...props.params,
        ...getFilter(),
      })
      .then((rs) => {
        if (rs.data?.total) {
          tableData.value = rs.data;
          data.value = rs.data.data;
          props.pagination.total = rs.data?.total ? rs.data.total : 0;
        } else {
          data.value = rs.data;
        }
      })
      .finally(() => {
        checkAll.value = false;
        if (showLoading) {
          loading.value = false;
        }
      });
  }
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

watch(() => appState.versions[props.reloadVersion], () => {
  reload()
})
reload(true);
const showAdvanceSearch = ref(false)
const toggleSearch = function () {
  showAdvanceSearch.value = !showAdvanceSearch.value
}
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
          <div class="search-input">
            <a class="btn btn-searchset"><img src="@/assets/img/icons/search-white.svg" alt="img"></a>
            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>
              <a-input type="search" class="" @keyup.enter.native="reload" v-model:value="filter.search"
                       placeholder="Search..."
              />
            </label>
            </div>
          </div>
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

      <div v-if="data?.length" class="table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
          <table class="table datanew dataTable no-footer" id="DataTables_Table_0" role="grid"
                 aria-describedby="DataTables_Table_0_info">
            <thead>
            <tr role="row">
              <th v-if="showSelection" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                  colspan="1"
                  aria-sort="ascending" aria-label="
: activate to sort column descending" style="width: 50.65px;">
                <label class="checkboxs">
                  <input v-model="checkAll" @change="toggleCheckAll" type="checkbox" id="select-all">
                  <span class="checkmarks"></span>
                </label>
              </th>
              <th v-for="column in columns" :key="column.key" scope="col" :width="column.width ? column.width : 'auto'"
                  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                  aria-label="Date: activate to sort column ascending">
                <slot :name="'header['+column.key+']'">
                  {{ column.title }}
                </slot>
              </th>
              <th v-if="itemActions.length" :width="80" scope="col"
                  class="p-2 text-center whitespace-nowrap">
                {{ __("Action") }}
              </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in data" :class="{ 'odd': index % 2 === 0 }">
              <td v-if="showSelection" class="sorting_1">
                <label class="checkboxs">
                  <input :id="item[tableConfig.item_key]" v-model="selectedItems" :value="item" type="checkbox">
                  <span class="checkmarks"></span>
                </label>
              </td>
              <td v-for="column in columns" :key="column.key">
                <slot :name="'cell[' + column.key + ']'" v-bind="{ item, column, index }">
                  {{
                    $style["format"][column.key]
                      ? $style["format"][column.key]($format.getObjValue(item,column.key))
                      : $format.getObjValue(item,column.key)
                  }}
                </slot>
              </td>

              <td v-if="itemActions.length" class="text-center relative ">
                <a-dropdown trigger="click" placement="bottomRight">
                  <a-button class="action-set"
                            aria-expanded="true">
                    <template #icon>
                      <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                    </template>
                  </a-button>
                  <template #overlay>
                    <a-menu>
                      <template v-for="itemAction in itemActions">
                        <a-menu-item>
                          <slot :name="'cellAction[' + itemAction.key + ']'" v-bind="{
                    item,
                    itemAction,
                    actionMethod() {
                      itemAction.action(item, reload);
                    },
                  }">
                            <a-popconfirm v-if="itemAction.confirm" title="Are you sure？"
                                          @confirm="itemAction.action(item, reload)">
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
                      " type="link" @click="itemAction.action(item, reload)">
                              <template v-if="itemAction.icon" #icon>
                                <i :class="itemAction.icon" class="flex-none mr-2"/>
                              </template>
                              {{ itemAction.label }}
                            </a-button>
                          </slot>
                        </a-menu-item>
                      </template>
                    </a-menu>
                  </template>
                </a-dropdown>
              </td>
            </tr>

            </tbody>
          </table>
          <a-pagination v-if="showPagination && data && pagination?.total > pagination.perPage"
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
