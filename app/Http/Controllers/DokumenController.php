<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanLayanan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;


class DokumenController extends Controller
{
    public function download(PengajuanLayanan $pengajuan)
    {
        $path = public_path("storage/{$pengajuan->dokumen_path}");

        if (!file_exists($path)) {
            abort(404, 'Dokumen tidak ditemukan.');
        }

        return response()->download($path);
    }


}
