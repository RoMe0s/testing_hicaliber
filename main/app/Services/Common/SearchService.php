<?php

namespace App\Services\Common;

use Illuminate\Database\Eloquent\Builder;

class SearchService
{
    /**
     * @param Builder $builder
     * @param BaseCriteria[] $rules
     */
    public function apply(Builder $builder, array $rules): void
    {
        foreach ($rules as $rule) {
            $rule->apply($builder);
        }
    }
}