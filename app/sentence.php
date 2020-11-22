<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class sentence extends Model
{
    protected $fillable=['word'];
    public $timestamps=false;

    public function scopeFindSentence($query,$sentence){
        return $query->whereWord($word);
    }

    public function scopeStateCheck($query,$state){
        return $query->whereHas('Detail', function($query) use ($state) {$query->whereState($state)->where('usage','sentence');});
    }

    // Defining Relationships ...
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function persians(){
        return $this->belongsToMany(Persian::class);
    }
    public function detail(){
        return $this->hasOne(Detail::class, 'foreign_id');
    }
    public function words()
    {
        return $this->belongsToMany(Word::class);
    }
}
