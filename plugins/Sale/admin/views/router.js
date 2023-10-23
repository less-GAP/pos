export default [
  {
    meta: {
      title: "Sales ",
    },
    path: "/sales",
    redirect: '/sales/order',
    component: () => import("./Layout.vue"),
    children: [
      {
        meta: {
          title: "Sales List",
        },
        path: '/sales/order',
        name: "sales-list",
        component: () => import("./SalesOrder.vue")
      },
      {
        meta: {
          title: "Sales Order Detail",
        },
        path: "/sales/order/:id/detail",
        name: "sales-order-detail",
        component: () => import("./SalesOrderDetail.vue")
      },

      {
        meta: {
          title: "New Sales",
        },
        path: "/sales/order/new",
        name: "new-sales",
        component: () => import("./NewSalesOrder.vue")
      },
      {
        meta: {
          title: "Sales Return List",
        },
        path: "/sales/return-list",
        name: "sales-return-list",
        component: () => import("./SalesReturnList.vue")
      }, {
        meta: {
          title: "New Sales Return",
        },
        path: "/sales/return-list/new",
        name: "new-sales-return",
        component: () => import("./NewSalesReturn.vue")
      }
    ]

  },
  {
    meta: {
      title: "POS",
    },
    path: "/sales/pos",
    name: "pos",
    component: () => import("./Pos.vue")
  },

]
