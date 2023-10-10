import menuAside from "@/menuAside";
import router from "@/router";
import {useAuthStore} from "@/stores/auth";
import Api from "@/utils/Api";


const SearchItems = [
  {
    label: 'Applications',
    search: function (term) {
      const authStore = useAuthStore();
      return new Promise(resolve => {
        let result = menuAside
          .filter(menu => {
            return !menu.disable && menu.path && authStore.hasPermission(menu.permission)
          })
          .filter(menu => {
            return !term || (menu.meta?.title?.toLowerCase().includes(term.toLowerCase()))
          }).map(item => {
            return {
              label: item.meta?.title,
              icon: item.icon,
              action() {
                router.push(item.path)
              }
            }
          })
        resolve(result.slice(0, 10));
      })

    }
  },
  {
    label: 'Sales Orders',
    permission: 'order.list',
    search: function (term) {
      return new Promise(resolve => {
          Api.get('/sales-order/all?limit=10&filter[search]=' + (term ? term : '')).then(rs => {
            resolve(rs.data.map(item => {
              return {
                label: item.order_code,
                action() {
                  router.replace('/patient/' + item.id + '/detail')
                }
              }
            }))
          })
        }
      )
    }
  }, {
    label: 'Products',
    permission: 'product.list',
    search: function (term) {
      return new Promise(resolve => {
          Api.get('/product/all?limit=10&filter[search]=' + (term ? term : '')).then(rs => {
            resolve(rs.data.map(item => {
              return {
                label: item.full_name,
                action() {
                  router.replace('/product/' + item.id + '/edit')
                }
              }
            }))
          })
        }
      )
    }
  }
]
export default SearchItems
