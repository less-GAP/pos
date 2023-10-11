<script setup>
import { computed } from "vue";

const props = defineProps({
  path: {
    type: String,
    required: true,
  },
  w: {
    type: String,
    default: "w-6",
  },
  h: {
    type: String,
    default: "h-6",
  },
  size: {
    type: [String, Number],
    default: null,
  },
});

const spanClass = computed(
  () => ``
);

const iconSize = computed(() => props.size ?? 16);
</script>

<template>
    <svg
      viewBox="0 0 24 24"
      :width="iconSize"
      :height="iconSize"
    >
      <path fill="currentColor" :d="path" />
    </svg>
</template>
