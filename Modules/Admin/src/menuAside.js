// https://pictogrammers.com/library/mdi/
import {
  mdiStore,
  mdiMonitor,
  mdiCardAccountDetails,
  mdiCart
} from "@mdi/js";

export default [{
  path: "/",
  icon: mdiMonitor,
  meta: {
    title: "Dashboard",
  },
},
  {
    meta: {
      title: "POS",
    },
    icon: mdiStore,
    permission: 'pos',
    path: "/sales/pos",
  },
  {
    permission: 'sale.list',
    icon: mdiCart,
    path: "/sales",
    meta: {
      title: "Sales",
    }
  },
  {
    meta: {
      title: "Staff",
    },
    icon: mdiStore,
    permission: 'Admin',
    path: "/staff",
  },
];
