<?php

namespace App\Services\Common;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseCriteria
{
    protected string $column;
    protected $value;

    final public function __construct(string $column, $value)
    {
        $this->column = $column;
        $this->value = $value;
    }

    abstract public function apply(Builder $builder): void;
}