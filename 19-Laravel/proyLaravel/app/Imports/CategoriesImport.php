<?php

namespace App\Imports;

use Illuminate\Support\Fades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

use App\Category;

class CategoriesImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Category([
        	'name' => $row[0],
        	'description' => $row[1]
        ]);
    }
}
