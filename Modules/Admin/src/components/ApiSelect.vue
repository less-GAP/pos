<template>
  <a-select
    class="w-full"
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
</template>
<script lang="ts">
import {defineComponent, ref, watch, unref, computed, toRaw} from 'vue';
import Api from "@/utils/Api";
import {createApiStore} from '@/stores/apiStore'

export default defineComponent({
  name: 'InputUpload',
  components: {},
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
      console.log(999, options)
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
