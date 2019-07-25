<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autobus extends Model
{
    public $table = 'autobus';

    protected $fillable = ['type','size','number','hLeave','dateLeave','id_chofer'];

}
