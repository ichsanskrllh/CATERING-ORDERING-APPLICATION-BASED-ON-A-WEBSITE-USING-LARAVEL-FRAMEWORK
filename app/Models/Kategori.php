<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable  = ['nama_kategori'];

    public function barang()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
