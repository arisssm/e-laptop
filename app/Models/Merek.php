<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    use HasFactory;
    protected $table = 'merek';
    protected $guarded = [''];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'produk_id', 'id');
    }
}
