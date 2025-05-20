<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrderSeragam extends Model
{
    use HasFactory;
    protected $table = 't_pesan_seragam_detail';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pesan_seragam_id',
        'no_pemesanan',
        'nama_siswa',
        'lokasi_sekolah',
        'nama_kelas',
        'produk_id',
        'ukuran',
        'quantity',
        'harga',
        'diskon'
    ];

    public static function get_detail_produk ($id) {
        $data = DetailOrderSeragam::select('t_pesan_seragam_detail.*', 'm_produk_seragam.*' )
                ->leftJoin('m_produk_seragam', 't_pesan_seragam_detail.produk_id', 'm_produk_seragam.id')
                ->where('t_pesan_seragam_detail.no_pemesanan', $id)
                ->get();
        return $data;
    }
}
