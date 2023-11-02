import Api from "@/utils/Api";

export function EloquentRouter() {

  const getListApi = function (prefix, params) {
    return Api.get(prefix + '/list', params)
  };
  const getDetailApi = function (prefix, id, params) {
    return Api.get(prefix + '/' + id, params)
  };
  const getRelationShipApi = function (prefix, id, relation, params) {
    return Api.get(prefix + '/' + id + '/' + relation, params)
  };
  const attachRelationShipApi = function (prefix, id, relation, relationId) {
    return Api.post(prefix + '/' + id + '/' + relation, {id: relationId})
  };
  const detachRelationShipApi = function (prefix, id, relation, relationId) {
    return Api.delete(prefix + '/' + id + '/' + relation + '/' + relationId)
  };
  const createApi = function (prefix, params) {
    return Api.post(prefix, params)
  };
  const updateApi = function (prefix, id, params) {
    return Api.put(prefix + '/' + id, params)
  };
  const deleteApi = function (prefix, id) {
    return Api.delete(prefix + '/' + id)
  };
  return {
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
