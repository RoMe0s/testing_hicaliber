<?php

namespace App\Http\Requests\Building;

use App\Services\Building\SearchBuildingVO;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SearchRequest
 * @package App\Http\Requests\Building
 *
 * @property ?string $name
 * @property ?float $price_from
 * @property ?float $price_to
 * @property ?int $bedrooms
 * @property ?int $bathrooms
 * @property ?int $storeys
 * @property ?int $garages
 */
class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $priceToRule = 'sometimes|nullable|numeric|min:0';

        if ($this->has('price_from') && $this->get('price_from') !== null) {
            $priceToRule .= '|gte:price_from';
        }

        return [
            'name' => 'sometimes|nullable|string',
            'price_from' => 'sometimes|nullable|numeric|min:0',
            'price_to' => $priceToRule,
            'bedrooms' => 'sometimes|nullable|integer|min:0',
            'bathrooms' => 'sometimes|nullable|integer|min:0',
            'storeys' => 'sometimes|nullable|integer|min:0',
            'garages' => 'sometimes|nullable|integer|min:0',
        ];
    }

    public function getSearchVO(): SearchBuildingVO
    {
        return new SearchBuildingVO(
            $this->name,
            $this->price_from,
            $this->price_to,
            $this->bedrooms,
            $this->bathrooms,
            $this->storeys,
            $this->garages
        );
    }
}
