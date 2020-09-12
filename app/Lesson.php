<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable=['lesson','foreign_id'];
    public $timestamps=false;
}
