<template>
  <slot v-bind="{store}"></slot>
</template>
<script setup>
import {defineComponent, ref, watch, unref, computed} from 'vue';
import {createApiStore} from '@/stores/apiStore'

const props = defineProps({
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
})
const emit = defineEmits(['load'])
const store = createApiStore(props.url, {...props.config, cache: true})
emit('load', store)
</script>
