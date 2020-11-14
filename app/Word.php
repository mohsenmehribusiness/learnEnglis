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

    public function scopeStateCheck($query,$state=null){
       if($state=='1')
           $query->whereHas('Detail', function($query) use ($state) {
               $query->where
               ([
                   ['state', '=',1],
                   ['usage', '=', 'word'],
               ]);
           });
       elseif ($state=='0')
           $query->whereHas('Detail', function($query) use ($state) {
               $query->where
               ([
                   ['state', '=',0],
                   ['usage', '=', 'word'],
               ]);
           });
       return $query;
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
        return $this->belongsToMany(sentence::class);
    }

}
