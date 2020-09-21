<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Persian extends Model
{
    protected $fillable=['persian'];
    public $timestamps=false;

    public function scopeFindPersian($query,$persian){
        return $query->wherePersian($persian);
    }

    public function words(){
        return $this->belongsToMany(Word::class);
    }

    public function Sentences(){
        return $this->belongsToMany(sentence::class);
    }
}
