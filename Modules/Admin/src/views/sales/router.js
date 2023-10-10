export default [
  {
    meta: {
      title: "Sales List",
    },
    path: "/sales-order",
    name: "sales-list",
    component: () => import("./SalesOrder.vue")
  },
  {
    meta: {
      title: "Sales Order Detail",
    },
    path: "/sales-order/:id/detail",
    name: "sales-order-detail",
    component: () => import("./SalesOrderDetail.vue")
  },
  {
    meta: {
      title: "POS",
    },
    path: "/pos",
    name: "pos",
    component: () => import("./Pos.vue")
  },
  {
    meta: {
      title: "New Sales",
    },
    path: "/sales-order/new",
    name: "new-sales",
    component: () => import("./NewSalesOrder.vue")
  },
  {
    meta: {
      title: "Sales Return List",
    },
    path: "/sales-return-list",
    name: "sales-return-list",
    component: () => import("./SalesReturnList.vue")
  }, {
    meta: {
      title: "New Sales Return",
    },
    path: "/new-sales-return",
    name: "new-sales-return",
    component: () => import("./NewSalesReturn.vue")
  }

]
