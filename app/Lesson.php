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
        return $query->whereLesson($lesson)->first();
    }

    // Defining Relationships ...
    public function words()
    {
        return $this->belongsToMany(Word::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function sentences()
    {
        return $this->belongsToMany(sentence::class);
    }
    public function qas()
    {
        return $this->belongsToMany(Qa::class);
    }
}
