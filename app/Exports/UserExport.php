<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithUpserts;

class UserExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $users = User::all(['nama', 'nik', 'plant', 'departemen']);

        // Tambahkan nomor urut pada setiap baris data
        $numberedUsers = $users->map(function ($user, $index) {
            return [
                'No.' => $index + 1,
                'Nik' => $user->nik,
                'Nama Lengkap' => $user->nama,
                'Plant' => $user->plant,
                'Departemen' => $user->departemen,
                // ... (tambahkan kolom lain jika diperlukan)
            ];
        });

        return $numberedUsers;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Tentukan nama kolom (header) yang diinginkan
        return [
            'No.',
            'Nik',
            'Nama Lengkap',
            'Plant',
            'Departemen',
            // ... (tambahkan kolom lain jika diperlukan)
        ];
    }
    public function model(array $row)
    {
        return User::updateOrInsert(
            ['nama' => $row['nama']]
        );
    }
}
