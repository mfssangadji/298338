<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $fillable = ['album_id','file'];

    public function album()
    {
    	return $this->belongsTo(Album::class);
    }
}
