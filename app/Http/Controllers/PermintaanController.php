<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function index()
    {
        return view('perbaikan.permintaan.index');
    }
    public function status()
    {
        return view('perbaikan.status.index');
    }
}
