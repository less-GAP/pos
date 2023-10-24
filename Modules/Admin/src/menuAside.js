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
      title: "System",
    },
    order: 99,
    icon: 'fa fa-cogs',
    permission: 'Admin',
    path: "/system",
  },
];
