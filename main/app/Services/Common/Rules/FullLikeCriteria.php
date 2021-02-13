<?php

namespace App\Services\Common\Rules;

use App\Services\Common\BaseCriteria;
use Illuminate\Database\Eloquent\Builder;

class FullLikeCriteria extends BaseCriteria
{
    public function apply(Builder $builder): void
    {
        $builder->where($this->column, 'like', '%' . $this->value . '%');
    }
}