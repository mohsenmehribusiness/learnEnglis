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

    // Defining Relationships ...
    public function lessons(){
        return $this->belongsToMany(Lesson::class);}
    public function tags(){
        return $this->belongsToMany(Tag::class);}
    public function persians(){
        return $this->belongsToMany(Persian::class);}
    public function detail(){
        return $this->hasOne(Detail::class, 'foreign_id');}
    public function sentences(){
        return $this->belongsToMany(sentence::class);
    }

}
