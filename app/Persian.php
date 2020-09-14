<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persian extends Model
{
    protected $fillable=['persian','foreign_id','usage'];
    public $timestamps=false;

    public function Word(){
        return $this->belongsTo(Word::class);
    }
}