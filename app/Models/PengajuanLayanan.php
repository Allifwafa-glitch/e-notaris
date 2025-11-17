<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanLayanan extends Model
{
    protected $table = 'pengajuan_layanans';

    protected $fillable = [
        'judul',
        'user_id',
        'nama_klien',
        'jenis_layanan',
        'keterangan',
        'status',
        'dokumen_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
