<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Lesson extends Model
{
    protected $fillable=['lesson','description'];
    public $timestamps=false;

    public function scopeLessonStartLetter($query, $key){
        return $query->where('lesson', 'like', $key.'%');
    }

    public function scopeFindLesson($query,$lesson){
        return $query->whereLesson($lesson);
    }

    public function words()
    {
        return $this->belongsToMany(Word::class);
    }

    public function Sentences()
    {
        return $this->belongsToMany(sentence::class);
    }
}
