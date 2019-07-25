<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    public $table = 'pasajero';

    protected $fillable = ['name','address','phone','id_autobus','id_boleto'];
}
