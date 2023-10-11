<script setup>
import {BaseIcon} from "@/components/index";
import {HomeOutlined} from '@ant-design/icons-vue';

const props = defineProps(
  {
    items: {
      type: Array,
      required: true,
    }
  }
)

</script>
<template>
  <a-breadcrumb class="mb-3">
    <a-breadcrumb-item>
      <router-link :to="'/'" class="inline-flex items-center">
        <home-outlined/>
      </router-link>
    </a-breadcrumb-item>
    <a-breadcrumb-item v-if="$auth.hasPermission(item?.permission)" v-for="item in items">
      <router-link :to="item.path">
      <span
        :class="$route.matched.filter(matched=>matched.path==item.path).length?'!text-themePrimary':'!text-gray-800'">
      {{ item.meta?.title }}
      </span>
      </router-link>
    </a-breadcrumb-item>
  </a-breadcrumb>

</template>
