<script lang="ts">
import {defineComponent, ref, watch} from 'vue';
import {Tooltip, Space} from 'ant-design-vue';
import {CopyOutlined} from "@ant-design/icons-vue";
import {message} from 'ant-design-vue';

export default defineComponent({
  components: {CopyOutlined},
  props: {
    value: Object,
    symbol: String
  },
  emits: ['change', 'update:value'],
  setup(props, {emit, attrs}) {
    const inputValue = ref(props.value)
    watch(() => props.value, async () => {
      inputValue.value = props.value
    })
    return {
      inputValue,
      handleChange(value) {
        emit('change', inputValue.value)
        emit('update:value', inputValue.value)
      },
    };
  },
});
</script>

<template>
  <a-input-number
    style="width: 100%;"
    @input="handleChange"
    v-bind="$attrs" v-model:value="inputValue"
    :formatter="value => `$ ${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
    :parser="value => value.replace(/\$\s?|(,*)/g, '')"
  />

</template>
