import Api from "@/utils/Api";
import {createPluginStore} from "@/stores/pluginStore";

export async function getMenus() {
  const {data} = await Api.get('/plugin/menus')
  return data;
}

export async function getPlugin(pluginName) {
  return await createPluginStore(pluginName)
}
