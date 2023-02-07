<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKamar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function fasilitasKamars()
    {
        return $this->belongsToMany(FasilitasKamar::class, 'tipe_kamars_fasilitas_kamars', 'tipe_kamar_id', 'fasilitas_kamar_id');
    }
}
