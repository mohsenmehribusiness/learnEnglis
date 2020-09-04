<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['english', 'persian', 'sentence', 'state', 'star','tag','lesson'];
    protected $casts=['persian'=>'array','sentence'=>'array','tag'=>'array'];
}