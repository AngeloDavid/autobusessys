<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    public $table = 'boleto';

    protected $fillable = ['name','date','type','orgin','chair','hLeave'];
}
