<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buletin extends Model
{
    protected $table = "buletin";
    protected $fillable = ['file'];
}
