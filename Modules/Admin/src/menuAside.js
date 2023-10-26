// https://pictogrammers.com/library/mdi/


export default [{
  path: "/",
  icon: 'fa fa-tachometer',
  order: 0,
  meta: {
    title: "Dashboard",
  },
},
  {
    meta: {
      title: "Plugins",
    },
    order: 98,
    icon: 'fa fa-plug',
    permission: 'Plugin',
    path: "/plugin",
  }, {
    meta: {
      title: "System",
    },
    order: 99,
    icon: 'fa fa-cogs',
    permission: 'Admin',
    path: "/system",
  },
];
