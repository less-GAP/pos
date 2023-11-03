import Api from "@/utils/Api";
import {notification} from "ant-design-vue";
import {createApiStore} from "@/stores/apiStore";

export function UseEloquentRouter(prefix, options = {}) {
  const find = function (id, params) {
    return createApiStore(prefix + '/' + id, {params, autoload: true})
  }
  const paginate = function (params) {
    return createApiStore(prefix + '/paginate', {params})
  }
  const getListApi = function (params) {
    return Api.get(prefix + '/list', {params: {...options, ...params}})
  };
  const getDetailApi = function (id, params) {
    return Api.get(prefix + '/' + id, {params: {...options, ...params}})
  };
  const getRelationShipApi = function (id, relation, params) {
    return Api.get(prefix + '/' + id + '/' + relation, params)
  };
  const attachRelationShipApi = function (id, relation, relationId) {
    return Api.post(prefix + '/' + id + '/' + relation, {id: relationId})
  };
  const detachRelationShipApi = function (id, relation, relationId) {
    return Api.delete(prefix + '/' + id + '/' + relation + '/' + relationId)
  };
  const createApi = function (params) {
    return Api.post(prefix, params)
  };
  const updateApi = function (id, params) {
    return Api.put(prefix + '/' + id, params)
  };
  const deleteApi = function (id) {
    return Api.delete(prefix + '/' + id)
  };
  return {
    find,
    paginate,
    getListApi,
    attachRelationShipApi,
    detachRelationShipApi,
    getRelationShipApi,
    getDetailApi,
    createApi,
    deleteApi,
    updateApi
  }
}