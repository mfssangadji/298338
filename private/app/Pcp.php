<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcp extends Model
{
   	protected $table = "pcp";
    protected $fillable = ['file'];
}
