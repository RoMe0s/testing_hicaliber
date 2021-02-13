<?php

namespace App\Imports;

use App\Models\Building;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithValidation;

class BuildingsImport implements ToModel, WithProgressBar, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        return new Building([
            'name' => $row['name'],
            'price' => $row['price'],
            'bedrooms' => $row['bedrooms'],
            'bathrooms' => $row['bathrooms'],
            'storeys' => $row['storeys'],
            'garages' => $row['garages'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'unique:buildings',
        ];
    }
}