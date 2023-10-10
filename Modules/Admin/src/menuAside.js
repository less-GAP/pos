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
    path: "/pos",
  },
  {
    permission: 'sale.list',
    icon: mdiCart,
    path: "/sales-order",
    meta: {
      title: "Sales",
    },
    children: [
      {
        meta: {
          title: "Sales List",
        },
        path: "/sales-order",
      },

      {
        meta: {
          title: "New Sales",
        },
        path: "/sales-order/new",
      },
      {
        meta: {
          title: "Sales Return List",
        },
        path: "/sales-return-list",
      }, {
        meta: {
          title: "New Sales Return",
        },
        path: "/new-sales-return",
      }
    ]
  },
  {
    meta: {
      title: "System",
    },
  },
  {
    meta: {
      title: "Staff",
    },
    icon: mdiStore,
    permission: 'Admin',
    path: "/staff/user",
    children: [
      {
        meta: {
          title: "Users",
        },
        path: "/staff/user",
      }, {
        meta: {
          title: "Roles",
        },
        path: "/staff/role",
      },
      {
        meta: {
          title: "Permissions",
        },
        path: "/staff/permission",
      }
    ]
  },
];
