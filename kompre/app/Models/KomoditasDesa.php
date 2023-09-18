<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomoditasDesa extends Model
{
    use HasFactory;
    protected $fillable = ['desa_id', 'kategori_id', 'komoditi_id', 'jumlah'];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function komoditi()
    {
        return $this->belongsTo(Komoditi::class, 'komoditi_id');
    }

}

