<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $guarded = [];
    public $timestamps = true;

    public function kategoriBarang()
    {
        return $this->belongsTo(KategoriBarang::class);
    }

    public function satuanBarang()
    {
        return $this->hasMany(SatuanBarang::class);
    }
}
