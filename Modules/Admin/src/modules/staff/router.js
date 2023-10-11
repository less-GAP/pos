export default [
  {
    meta: {
      title: "Staff",
    },
    path: "/staff",
    redirect: "/staff/user",
    name: "staff",
    component: () => import("./Layout.vue"),

    children: [
      {
        meta: {
          title: "Users",
        },
        path: "/staff/user",
        name: "users",
        component: () => import("./users/index.vue"),
        children: [
          {
            meta: {
              title: "User Detail",
            },
            path: "/staff/user/:id",
            name: "user-detail",
            component: () => import("./users/FormUser.vue"),
          }
        ]
      }, {
        meta: {
          title: "Roles",
        },
        path: "/staff/role",
        name: "role",
        component: () => import("./roles/index.vue"),
        children: [
          {
            meta: {
              title: "Role Detail",
            },
            path: "/staff/role/:id",
            name: "role-detail",
            component: () => import("./roles/form.vue"),
          },
          {
            meta: {
              title: "Role Permissions",
            },
            path: "/staff/role/:id/permissions",
            name: "roles-permissions",
            component: () => import("./roles/permissions.vue"),
          }
        ]
      },
      {
        meta: {
          title: "Permissions",
        },
        path: "/staff/permission",
        name: "permission",
        component: () => import("./permissions/index.vue"),
        children: [
          {
            meta: {
              title: "Permissions",
            },
            path: "/staff/permission/:id",
            name: "permissions-detail",
            component: () => import("./permissions/form.vue"),
          }
        ]
      },
      {
        meta: {
          title: "Permission Groups",
        },
        path: "/staff/permission-group",
        name: "permission-group",
        component: () => import("./permission-groups/index.vue"),
        children: [
          {
            meta: {
              title: "Permission Groups",
            },
            path: "/staff/permission-group/:id",
            name: "permission-group-detail",
            component: () => import("./permission-groups/form.vue"),
          }
        ]
      }
    ]
  }
]
