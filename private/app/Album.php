<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    protected $fillable = ['name'];

    public function gallery()
    {
    	return $this->hasMany(Gallery::class);
    }
}
