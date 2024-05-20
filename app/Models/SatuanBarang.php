<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanBarang extends Model
{
    use HasFactory;
    protected $table = 'satuan_barang';
    protected $guarded = [];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
