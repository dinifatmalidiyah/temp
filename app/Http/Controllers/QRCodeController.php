<?php

namespace App\Http\Controllers;

use App\Models\DataMesin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{

    public function qrcodeView($id)
    {
        $datamesin = DataMesin::where('id', $id)->first();
        return view('mesin.qrcode-detail', compact('datamesin'));
    }

    public function index($nama_mesin)
    {
        // Mengambil data buku berdasarkan ID
        $mesin = DB::table('datamesin')->where('nama_mesin', $nama_mesin)->first();

        // Periksa apakah data buku ditemukan
        if (!$mesin) {
            abort(404); // Munculkan halaman 404 jika data buku tidak ditemukan
        }

        // Menghasilkan URL QR Code dengan ID data buku
        $qrCode = QrCode::size(200)->generate(route('qrcode-generate', ['id' => $mesin->kode_jenis]));

        return view('qrcode.index', [
            'qrCode' => $qrCode, // Mengirim QR Code ke view
            'mesin' => $mesin, // Mengirim data buku ke view
        ]);
    }
}
