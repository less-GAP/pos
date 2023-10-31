<template>
  <div class="w-full h-full flex flex-row">
    <a-select
      class="flex-1  !w-full"
      show-search
      allow-clear
      v-bind="$attrs"
      :filterOption="onFilter"
      @search="filterOption"
      v-model:value="inputValue"
      @change="handleChange"
    >
      <template :key="option[valueKey]" v-for="option in filteredOptions">
        <slot name="option" v-bind="{option,valueKey,labelKey}">
          <a-select-option :value="typeof inputValue == 'string'?String(option[valueKey]):option[valueKey]">
            {{ option[labelKey] }}
          </a-select-option>
        </slot>
      </template>

    </a-select>
    <a-button  v-if="$slots.create" class="ml-2  !h-[40px] !w-[40px] " type="primary" ghost @click="showCreate=true">
      <template #icon>
        <plus-outlined/>
      </template>
    </a-button>
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

export default defineComponent({
  components: {PlusOutlined},
  props: {
    value: [String, Number, Array],
    url: String,
    valueKey: {
      type: String
      , default: 'value'
    },
    labelKey: {
      type: String
      , default: 'label'
    },
    params: Object,
  },
  emits: ['change', 'update:value'],

  setup(props, {emit}) {
    const inputValue = ref(toRaw(props.value));
    const store = ref({data: []});
    const showCreate = ref(false);
    const options = computed(() => {
      return store.value.data
    });
    const filteredOptions = ref([]);
    watch(() => props.value, function () {
      inputValue.value = toRaw(props.value)
    })

    function onFilter() {
      return true
    }

    const filterOption = (input: string) => {
      if (!input || input == '') {
        filteredOptions.value = toRaw(options.value)
        return
      }
      const filters = toRaw(options.value).filter(option => {
        return String(option[props.labelKey]).toLowerCase().indexOf(String(input).toLowerCase()) >= 0 || String(option[props.valueKey]).toLowerCase().indexOf(String(input).toLowerCase()) >= 0;
      })
      filteredOptions.value = filters
      return
    };


    async function fetch() {
      store.value = await createApiStore(props.url, {autoload: false})
      store.value.fetch({params: props.params}).then(() => {
        filterOption('')
      })
    }

    fetch()
    return {
      store,
      fetch,
      hideModal() {
        showCreate.value = false
      },
      setValue(value) {
        inputValue.value = value
        emit('update:value', inputValue.value);
        emit('change', inputValue.value);
      },
      showCreate,
      filteredOptions,
      inputValue,
      onFilter,
      filterOption,
      options,
      async handleChange() {
        emit('update:value', inputValue.value);
        emit('change', inputValue.value);
      },
    };
  },
});
</script>
