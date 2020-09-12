<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['tag','foreign_id'];
    protected $casts=['tags'=>'array'];
    public $timestamps=false;

    public function Word(){
        return $this->belongsTo(Word::class);
    }

    public function Sentence(){
        return $this->belongsTo(sentence::class);
    }
}
