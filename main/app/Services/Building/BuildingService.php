<?php

namespace App\Services\Building;

use App\Models\Building;
use App\Services\Common\SearchService;
use Illuminate\Support\Collection;

class BuildingService
{
    private SearchService $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(SearchBuildingVO $vo): Collection
    {
        $query = Building::query();

        $this->searchService->apply($query, $vo->getCriteria());

        return $query->get();
    }
}