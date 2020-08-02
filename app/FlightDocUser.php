<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightDocUser extends Model
{
    protected $table = 'flightdoc_users';
    protected $fillable = [
    	'name',
    	'email',
    	'maskapai',
    	'password'
    ];
}
