export default [
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
    children:[
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
]
