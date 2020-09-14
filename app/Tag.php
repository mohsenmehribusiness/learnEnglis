<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['tag','foreign_id','usage'];
    protected $casts=['tags'=>'array'];
    public $timestamps=false;

    public function scopeTagSentences($query){
        return $query->whereUsage('sentence');
    }

    public function scopeTagWords($query){
        return $query->whereUsage('word');
    }

    public function scopeTagStartLetter($query, $key){
        return $query->where('tag', 'like', $key.'%');
    }

    public function Word(){
        return $this->belongsTo(Word::class);
    }

    public function Sentence(){
        return $this->belongsTo(sentence::class);
    }
}
