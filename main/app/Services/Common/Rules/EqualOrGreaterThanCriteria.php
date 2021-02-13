<?php

namespace App\Services\Common\Rules;

use App\Services\Common\BaseCriteria;
use Illuminate\Database\Eloquent\Builder;

class EqualOrGreaterThanCriteria extends BaseCriteria
{
    public function apply(Builder $builder): void
    {
        $builder->where($this->column, '>=', $this->value);
    }
}