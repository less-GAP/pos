<script>
import {defineComponent, watch, ref, unref} from 'vue';
import {Tooltip} from 'ant-design-vue';
import {SearchOutlined} from '@ant-design/icons-vue';
import AppSearchModal from './AppSearchModal.vue';
import {useMagicKeys} from '@vueuse/core';


export default defineComponent({
  name: 'AppSearch',
  components: {SearchOutlined, AppSearchModal},
  setup() {
    const modal = ref()
    const changeModal = function () {
      modal.value.changeModal(true)
    }
    return {
      modal,
      changeModal
    }
  }
})
</script>
<template>
  <div @click="changeModal(true)" class="top-nav-search">

    <a href="javascript:void(0);" class="responsive-search">
      <i class="fa fa-search"></i>
    </a>
    <form action="#">
      <div class="searchinputs">
        <input type="text" placeholder="Search Here ...">
        <div class="search-addon">
          <span><img src="@/assets/img/icons/closes.svg" alt="img"></span>
        </div>
      </div>
      <a class="btn" id="searchdiv">
        <a-input :readonly="true" placeholder="Quick Search... (Ctrl+k)">
          <template #suffix>
            <img src="@/assets/img/icons/search.svg" alt="img">

          </template>
        </a-input>
      </a>
    </form>
  </div>

  <AppSearchModal ref="modal"></AppSearchModal>
</template>
