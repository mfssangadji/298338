<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermintaanData extends Model
{
    protected $table = 'permintaan_data';
    protected $fillable = [
    	'nama',
    	'email',
    	'no_hp',
    	'pesan',
    ];
}
