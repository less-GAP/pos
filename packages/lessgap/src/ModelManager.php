<?php

namespace Lessgap;


use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ModelManager
{
    public $models = [];

    public function active($models)
    {
        $this->models = array_merge($this->models, $models);
    }

    public function paginate(Request $request, $modelName)
    {
        $config = $this->models[$modelName] ?? null;
        if (!$config) {
            throw new \Exception('Model not yet registered!');
        }
        return QueryBuilder::for($config['class'])
            ->defaultSort($config['defaultSort'] ?? '-id')
            ->allowedIncludes($config['allowedIncludes'] ?? [])
            ->allowedFilters($config['allowedFilters'] ?? [])
            ->allowedSorts($config['allowedSorts'] ?? 'id')
            ->paginate($request->input('perPage', 15))
            ->appends($request->query());
    }

    public function all(Request $request, $modelName)
    {
        $config = $this->models[$modelName] ?? null;
        if (!$config) {
            throw new \Exception('Model not yet registered!');
        }
        return QueryBuilder::for($config['class'])
            ->defaultSort($config['defaultSort'] ?? '-id')
            ->allowedIncludes($config['allowedIncludes'] ?? [])
            ->allowedFilters($config['allowedFilters'] ?? [])
            ->allowedSorts($config['allowedSorts'] ?? 'id')
            ->groupBy(\DB::raw($config['groupBy'] ?? 'id'))
            ->limit($request->input('limit', $config['limit'] ?? 100))
            ->get();
    }

    public function updateOrCreate(Request $request, $modelName)
    {
        $config = $this->models[$modelName] ?? null;
        if (!$config) {
            throw new \Exception('Model not yet registered!');
        }
        $class = $config['class'];
        $model = new $class;
        $data = $request->all();
        $result = $class::where([$model->getKeyName() => $request->input($model->getKeyName())])->first();
        if ($result) {
            $result->fill($data)->save();
        } else {
            $result = $class::create($data);
        }
        foreach ($config['allowedIncludes'] as $relation) {
            if (!empty($request->input($relation)) && method_exists($result, 'save' . ucfirst($relation))) {
                $result->{'save' . ucfirst($relation)}($request->input($relation));
            }
        }
        return [
            'result' => $result,
            'message' => $request->input($model->getKeyName()) ? 'Update Successfully!' : 'Create Successfully!'
        ];
    }

    public function getDetail(Request $request, $modelName)
    {
        $config = $this->models[$modelName] ?? null;
        if (!$config) {
            throw new \Exception('Model not yet registered!');
        }
        $class = $config['class'];
        $model = new $class;
        $query = $class::query();
        if ($id = $request->route('id')) {
            $query->where($model->getKeyName(), $id);
        }
        return $query->with($config['allowedIncludes'] ?? [])->first();
    }

}
