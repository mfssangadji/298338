<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightDoc extends Model
{
    protected $table = "flightdoc";
    protected $fillable = ['maskapai', 'file'];
}
