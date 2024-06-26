<template>
  <div class="w-full h-full flex flex-row">
    <a-select
      class="flex-1  !w-full"
      show-search
      allow-clear
      :mode="mode"
      v-bind="$attrs"
      :filterOption="onFilter"
      @search="filterOption"
      v-model:value="inputValue"
      @change="handleChange"
    >
      <template :key="option[valueKey]" v-for="option in filteredOptions">
        <slot name="option" v-bind="{option,valueKey,labelKey}">
          <a-select-option
            :disabled="disableValues.includes(typeof inputValue == 'string'?String(option[valueKey]):option[valueKey])"
            :value="typeof inputValue == 'string'?String(option[valueKey]):option[valueKey]"
            :dataOption="option"
          >
            {{ $format.getObjValue(option, labelKey) }}
          </a-select-option>
        </slot>
      </template>
      <template #dropdownRender="{ menuNode: menu }">
        <v-nodes :vnodes="menu"/>
        <a-divider v-if="$slots.create" style="margin: 4px 0"/>
        <a-button v-if="$slots.create" size="mini" class="ml-2 d-block text-center  "
                  @click="showCreate=true" type="link">
          <template #icon>
            <plus-outlined/>
          </template>
          Add
        </a-button>
      </template>


    </a-select>

  </div>

  <a-modal v-model:open="showCreate" v-if="$slots.create">
    <slot v-if="showCreate" name="create" v-bind="{fetch,hideModal,setValue}"></slot>
    <template #footer></template>
  </a-modal>
</template>
<script lang="ts">
import {defineComponent, ref, watch, unref, computed, toRaw} from 'vue';
import Api from "@/utils/Api";
import {createApiStore} from '@/stores/apiStore'
import {PlusOutlined} from '@ant-design/icons-vue'

const VNodes = defineComponent({
  props: {
    vnodes: {
      type: Object,
      required: true,
    },
  },
  render() {
    return this.vnodes;
  },
});
export default defineComponent({
  components: {PlusOutlined, VNodes},
  props: {
    value: [String, Number, Array],
    url: String,
    mode: String,
    disableValues: {
      type: Array
      , default: []
    },
    valueKey: {
      type: String
      , default: 'value'
    }, selectValueKey: {
      type: String
      , default: 'value'
    },
    transformOption: {
      type: Function
      , default: function (option) {
        return option
      }
    },
    labelKey: {
      type: String
      , default: 'label'
    },
    params: Object,
  },
  emits: ['change', 'update:value'],

  setup(props, {emit}) {
    const inputValue = ref([])
    if (props.value) {
      inputValue.value = toRaw(props.value).map(item => item[props.valueKey]);
    }
    const store = ref({data: []});
    const showCreate = ref(false);
    const options = computed(() => {
      return store.value.data
    });
    const filteredOptions = ref([]);
    watch(() => props.value, function () {
      if (props.value) {
        inputValue.value = toRaw(props.value).map(item => item[props.valueKey])
      }
    })

    function onFilter() {
      return true
    }

    const filterOption = (input: string) => {
      if (!input || input == '') {
        filteredOptions.value = store.value.data
        return
      }
      const filters = store.value.data.filter(option => {
        return String(option[props.labelKey]).toLowerCase().indexOf(String(input).toLowerCase()) >= 0 || String(option[props.valueKey]).toLowerCase().indexOf(String(input).toLowerCase()) >= 0;
      })
      filteredOptions.value = filters
      return
    };


    async function fetch() {
      store.value.fetch(props.params).then(() => {
        filterOption('')
      })
    }

    store.value = createApiStore(props.url, {autoload: false})
    fetch()


    async function handleChange() {
      const values = filteredOptions.value.filter(item => {
        return inputValue.value.includes(item[props.valueKey])
      }).map(props.transformOption)
      emit('update:value', values);
      emit('change', values);
    }

    return {
      store,
      fetch,
      hideModal() {
        showCreate.value = false
      },
      setValue(value) {
        if (props.mode == 'multiple') {
          inputValue.value.push(value[props.valueKey])
        } else {
          inputValue.value = value[props.valueKey]
        }
        handleChange()
      },
      handleChange,
      showCreate,
      filteredOptions,
      inputValue,
      onFilter,
      filterOption,
      options,

    };
  },
});
</script>
