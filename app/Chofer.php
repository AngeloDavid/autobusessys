<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
   public $table = 'chofer';

    protected $fillable = ['name'];
}
