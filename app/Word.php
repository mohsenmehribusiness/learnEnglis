<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['word'];
    public $timestamps=false;

    public function scopeFindWord($query,$word){
        return $query->whereWord($word);
    }

    public function scopeStateCheck($query,$state){
        return $query->whereHas('Detail', function($query) use ($state) {$query->whereState($state);});
    }

    public function Lessons(){
        return $this->belongsToMany(Lesson::class);}

    public function Tags(){
        return $this->belongsToMany(Tag::class);}

    public function Persians(){
        return $this->belongsToMany(Persian::class);}

    public function Detail(){
        return $this->hasOne(Detail::class, 'foreign_id');}

    public function Sentences(){
        return $this->hasMany(sentence::class,'foreign_id');}

}
