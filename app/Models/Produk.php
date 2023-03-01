<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $guarded = [''];
    // protected $fillable = ['nama','merek_id','harga','foto','stok','spesifikasi'];

    public function keranjang()
    {
        return $this->hasOne(Keranjang::class, 'keranjang_id', 'id');
    }

    public function merek()
    {
        return $this->belongsTo(Merek::class, 'merek_id', 'id');
    }
}