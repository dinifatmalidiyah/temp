<?php

namespace App\Imports;

use App\Models\Departemen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DepartemenImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Departemen([
            'nama_departemen' => $row['nama_departemen'],
        ]);
    }
}
