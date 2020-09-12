<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['english'];
   // protected $casts=['persian'=>'array','sentence'=>'array','tag'=>'array'];
    public $timestamps=false;

    public function Lesson()
    {
        return $this->hasOne(Lesson::class,'foreign_id');
    }

    public function Tags()
    {
        return $this->hasMany(Tag::class, 'foreign_id');
    }

    public function Persians()
    {
        return $this->hasMany(Persian::class, 'foreign_id');
    }

    public function Detail()
    {
        return $this->hasOne(Detail::class, 'foreign_id');
    }

    public function Sentences()
    {
        return $this->hasMany(sentence::class,'foreign_id');
    }
}
