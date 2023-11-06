<?php


namespace App\Builder\Filters;


use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class SearchLikeMultipleField implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        $fields = explode(',', $property);
        $query->where(function ($subquery) use ($fields, $value) {
            foreach ($fields as $field) {
                $subquery->orWhere($field, 'like', '%' . $value . '%');
            }
        });

        return $query;
    }
}
