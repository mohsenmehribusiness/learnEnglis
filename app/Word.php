<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['english', 'persian', 'sentence', 'state', 'star','tag','lesson','repeat'];
    protected $casts=['persian'=>'array','sentence'=>'array','tag'=>'array'];
    public $timestamps=false;
}
