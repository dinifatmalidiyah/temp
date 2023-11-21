<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kategorimesin;
use App\Models\KlasMesin;

class DataMesin extends Model
{
    use HasFactory;
    protected $table = 'datamesin';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function kategori()
    {
        return $this->belongsTo(KategoriMesin::class, 'nama_kategori', 'id');
    }
    public function klasifikasi()
    {
        return $this->belongsTo(KlasMesin::class, 'klas_mesin', 'id');
    }
    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class);
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($jenis) {
            $latestJenis = kategoriMesin::latest()->first();

            if ($latestJenis) {
                $latestKode = $latestJenis->kodeJenis;
                $newKode = str_pad((int) $latestKode + 1, strlen($latestKode), '0', STR_PAD_LEFT);
            } else {
                $newKode = '001'; // Jika belum ada data
            }

            $jenis->kodeJenis = $newKode;
        });
    }
    protected $fillable = [
        'kategori_id',
        'klasifikasi_id',
        'no_mesin',
        'klas_mesin',
        'nama_mesin',
        'type_mesin',
        'merk_mesin',
        'spek_min',
        'spek_max',
        'pabrik',
        'kapasitas',
        'tahun_mesin',
        'lok_ws',
        'gambar_mesin',
        'nama_kategori',
        'nama_klasifikasi',
        'kode_kategori',
        'kode_klasifikasi',
        'kode_jenis',
        'kategorimesin_id',
        'klasmesin_id',
    ];
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'no_mesin' => $this->no_mesin,
            'klas_mesin' => $this->klas_mesin,
            'nama_mesin' => $this->nama_mesin,
            'type_mesin' => $this->type_mesin,
            'merk_mesin' => $this->merk_mesin,
            'spek_min' => $this->spek_min,
            'spek_max' => $this->spek_max,
            'pabrik' => $this->pabrik,
            'kapasitas' => $this->kapasitas,
            'tahun_mesin' => $this->tahun_mesin,
            'lok_ws' => $this->lok_ws,
        ];
    }
}
