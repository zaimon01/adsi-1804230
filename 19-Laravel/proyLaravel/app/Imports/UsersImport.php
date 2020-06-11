<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

use App\User;

class UsersImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new User([
        	'fullname' => $row[0],
        	'email' => $row[1],
        	'phone' => $row[2],
        	'birthdate' => $row[3],
        	'gender' => $row[4],
        	'address' => $row[5],
        	'password' => hash::make($row[6])
        ]);
    }
}
