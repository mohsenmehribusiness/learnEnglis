<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sentence extends Model
{
    protected $fillable=['sentence','usage','foreign_id'];
    public $timestamps=false;

    public function Lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function scopeUsage($query,$usage){
        return $query->whereUsage($usage);
    }

    public function Tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function Persians(){
        return $this->belongsToMany(Persian::class);
    }

    public function Detail(){
        return $this->hasOne(Detail::class, 'foreign_id');
    }

    public function scopeStateCheck($query,$state){
        return $query->whereHas('Detail', function($query) use ($state) {$query->whereState($state);});
    }
}
