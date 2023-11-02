import Api from "@/utils/Api";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";


const model = function model(modelName) {
  return UseEloquentRouter('/model/' + modelName)
}

export default {
  model
}
