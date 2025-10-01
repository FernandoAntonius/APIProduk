<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['nama', 'kode_produk', 'deskripsi'];

        public function reviewan() {
        return $this->hasMany(Reviewan::class, 'produks_id', 'id');
    }

}
