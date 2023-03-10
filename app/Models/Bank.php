<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'bank';
    protected $guarded = [''];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'pesanan_id', 'id');
    }
}
