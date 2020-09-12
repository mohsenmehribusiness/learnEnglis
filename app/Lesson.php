<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Lesson extends Model
{
    protected $fillable=['lesson','description'];
    public $timestamps=false;

    public function words()
    {
        return $this->belongsToMany(Word::class);
    }

    public function Sentences()
    {
        return $this->belongsToMany(sentence::class);
    }
}
