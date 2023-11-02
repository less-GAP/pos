export default [
  {
    meta: {
      title: "Plugins",
    },
    path: "/plugin",
    redirect: "/plugin/list",
    name: "plugin",
    component: () => import("./Layout.vue"),

    children: [
      {
        meta: {
          title: "Plugins",
        },
        path: "/plugin/list",
        name: "plugin",
        component: () => import("./index.vue"),
        children: [
        ]
      }
    ]
  }
]
