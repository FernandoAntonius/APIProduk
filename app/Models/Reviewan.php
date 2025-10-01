<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviewan extends Model
{
    protected $fillable = ['nama', 'kode_review', 'deskripsi', 'rekomendasi', 'produks_id'];

        public function produk() {
        return $this->belongsTo(Produk::class, 'produks_id', 'id');
    }
}
