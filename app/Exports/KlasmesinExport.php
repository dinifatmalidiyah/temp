<?php

namespace App\Exports;

use App\Models\KlasMesin;
use App\Models\Plant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithUpserts;

class KlasMesinExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $KlasMesins = KlasMesin::all(['nama_klasifikasi', 'kode_klasifikasi', 'kategorimesin_id']);

        // Tambahkan nomor urut pada setiap baris data
        $numberedKlasMesins = $KlasMesins->map(function ($KlasMesin, $index) {
            return [
                'No.' => $index + 1,
                'Kategori' => $KlasMesin->kategorimesin_id,
                'Nama Klasifikasi' => $KlasMesin->nama_klasifikasi,
                'Kode Klasifikasi' => $KlasMesin->kode_klasifikasi,
                // ... (tambahkan kolom lain jika diperlukan)
            ];
        });

        return $numberedKlasMesins;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // Tentukan nama kolom (header) yang diinginkan
        return [
            'No.',
            'Nama Klasifikasi',
            'Kode Klasifikasi',
            // ... (tambahkan kolom lain jika diperlukan)
        ];
    }
    public function model(array $row)
    {
        return KlasMesin::updateOrInsert(
            ['nama_klasifikasi' => $row['nama_klasifikasi']],
            ['kode_klasifikasi' => $row['kode_klasifikasi']],
        );
    }
}
