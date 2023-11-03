<template>
  <div style="background:#4b6580;padding:0 50px;display:flex;justify-content:space-between;align-items: center;">
    <a-menu @click="({item})=>{$router.replace(item.to)}" theme="dark" style="color:white;background:transparent;width:80%;" v-model:selectedKeys="current"
            mode="horizontal" :items="items"/>
    <router-link to="/sales/pos">
      <a-button style=" display: block;
    height: 44px;" class="align-right h-full" type="primary">
        <template #icon>
          <FireOutlined></FireOutlined>
        </template>
        POS
      </a-button>
    </router-link>

  </div>
</template>
<script lang="ts" setup>
import {h, ref} from 'vue';
import {
  ShopOutlined,
  DollarOutlined,
  EyeOutlined,
  LineChartOutlined,
  TeamOutlined,
  UserSwitchOutlined,
  ApartmentOutlined,
  FireOutlined,
  InteractionOutlined
} from '@ant-design/icons-vue';
import {MenuProps} from 'ant-design-vue';

const current = ref<string[]>(['mail']);
const items = ref<MenuProps['items']>([
  {
    key: 'dashboard',
    icon: () => h(EyeOutlined),
    label: 'Tổng quan',
    title: 'Tổng quan',
  }, {
    key: 'items',
    icon: () => h(ShopOutlined),
    label: 'Hàng hóa',
    title: 'Hàng hóa',
    children: [
      {
        key: 'items-1',
        label: 'Danh mục',
      },
      {
        key: 'items-2',
        label: 'Thiết lập giá',
      },
      {
        key: 'items-2',
        label: 'Kiểm kho',
      }

    ]
  },
  {
    key: 'place',
    icon: () => h(ApartmentOutlined),
    label: 'Vị trí/Phòng',
    title: 'Vị trí/Phòng',
  },
  {
    key: 'trade',
    icon: () => h(InteractionOutlined),
    label: 'Giao dịch',
    title: 'Giao dịch',
    children: [
      {
        key: 'items-1',
        label: 'Hóa đơn',
      },
      {
        key: 'items-2',
        label: 'Trả hàng',
      },
      {
        key: 'items-2',
        label: 'Nhập hàng',
      },
      {
        key: 'items-3',
        label: 'Trả hàng nhập',
      }
    ]
  },
  {
    key: 'partner',
    icon: () => h(UserSwitchOutlined),
    label: 'Đối tác',
    title: 'Đối tác ',
    children: [
      {
        key: 'items-1',
        label: 'Khách hàng',
      },
      {
        key: 'items-2',
        label: 'Nhà cung cấp',
      },
    ]
  },
  {
    key: 'staff',
    icon: () => h(TeamOutlined),
    label: 'Nhân viên',
    title: 'Nhân viên',
    children: [
      {
        key: 'items-1',
        label: 'Nhân viên',
        to:'/staff/user'
      },
      {
        key: 'items-2',
        label: 'Chấm công',
      },
      {
        key: 'items-2',
        label: 'Bảng tính lương',
      },
      {
        key: 'items-2',
        label: 'Hoa hồng',
      },
    ]
  },
  {
    key: 'money',
    icon: () => h(DollarOutlined),
    label: 'Sổ quỹ',
    title: 'Sổ quỹ',
  },
  {
    key: 'report',
    icon: () => h(LineChartOutlined),
    label: 'Báo cáo',
    title: 'Báo cáo',
    children: [
      {
        key: 'items-1',
        label: 'Cuối ngày',
      },
      {
        key: 'items-2',
        label: 'Bán hàng',
      },
      {
        key: 'items-2',
        label: 'Thẻ dịch vụ',
      },
      {
        key: 'items-2',
        label: 'Đánh giá dịch vụ',
      },
      {
        key: 'items-2',
        label: 'Hàng hóa ',
      },
      {
        key: 'items-2',
        label: 'Khách hàng',
      },
      {
        key: 'items-2',
        label: 'Nhà cung cấp',
      },
      {
        key: 'items-2',
        label: 'Nhân viên',
      },
      {
        key: 'items-2',
        label: 'Kênh bán hàng',
      },
      {
        key: 'items-2',
        label: 'Tài chính',
      },
    ]
  },


]);
</script>
