import Api from "@/utils/Api";

export function pluginManager($prefix) {
  return {
    view($view) {
      return Api.get('/plugin/' + $prefix + '/view/' + $view)
    },
    url(path) {
      return '/plugin/' + $prefix + path
    }
  }
}
