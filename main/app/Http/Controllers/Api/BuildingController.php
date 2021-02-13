<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Building\SearchRequest;
use App\Http\Resources\BuildingResource;
use App\Services\Building\BuildingService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BuildingController extends Controller
{
    public function index(SearchRequest $request, BuildingService $service): ResourceCollection
    {
        $buildings = $service->search($request->getSearchVO());

        return BuildingResource::collection($buildings);
    }
}