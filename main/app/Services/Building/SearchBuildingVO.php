<?php

namespace App\Services\Building;

use App\Services\Common\BaseCriteria;
use App\Services\Common\Rules\EqualCriteria;
use App\Services\Common\Rules\EqualOrGreaterThanCriteria;
use App\Services\Common\Rules\EqualOrLessThanCriteria;
use App\Services\Common\Rules\FullLikeCriteria;

class SearchBuildingVO
{
    /** @var BaseCriteria[] */
    protected array $criteria = [];

    public function __construct(
        ?string $name,
        ?float $price_from,
        ?float $price_to,
        ?int $bedrooms,
        ?int $bathrooms,
        ?int $storeys,
        ?int $garages
    )
    {
        if ($name !== null) {
            $this->criteria[] = new FullLikeCriteria('name', $name);
        }

        if ($price_from !== null) {
            $this->criteria[] = new EqualOrGreaterThanCriteria('price', $price_from);
        }

        if ($price_to !== null) {
            $this->criteria[] = new EqualOrLessThanCriteria('price', $price_to);
        }

        if ($bedrooms !== null) {
            $this->criteria[] = new EqualCriteria('bedrooms', $bedrooms);
        }

        if ($bathrooms !== null) {
            $this->criteria[] = new EqualCriteria('bathrooms', $bathrooms);
        }

        if ($storeys !== null) {
            $this->criteria[] = new EqualCriteria('storeys', $storeys);
        }

        if ($garages !== null) {
            $this->criteria[] = new EqualCriteria('garages', $garages);
        }
    }

    public function getCriteria(): array
    {
        return $this->criteria;
    }
}