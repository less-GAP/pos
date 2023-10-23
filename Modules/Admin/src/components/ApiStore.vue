<template>
  <slot v-bind="{store}"></slot>
</template>
<script lang="ts">
import {defineComponent, ref, watch, unref, computed} from 'vue';
import {createApiStore} from '@/stores/apiStore'

export default defineComponent({
  components: {},
  props: {
    modelStore: {
      type: Object,
    },
    url: {
      type: String
    },

    params: {
      type: Object,
      default: {
        autoload: true
      }
    },
    config: {
      type: Object,
      default: {
        autoload: true
      }
    },
  },
  emits: ['load'],

  setup(props, {emit}) {
    const store = createApiStore(props.url, {...props.config, params: props.params})
    emit('load', store)
    return {store};
  },
});
</script>
