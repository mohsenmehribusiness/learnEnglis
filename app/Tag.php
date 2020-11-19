<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Tag extends Model
{
    protected $fillable=['tag'];
    protected $casts=['tags'=>'array'];
    public $timestamps=false;

    public function scopeTagSentences($query){
        return $query->whereUsage('sentence');
    }

    public function __destruct()
    {
        ///delete tag

    }

    public function scopeFindTag($query,$tag){
        return $query->whereTag($tag)->first();
    }

    public function scopeTagWords($query){
        return $query->whereUsage('word');
    }

    public function scopeTagStartLetter($query, $key){
        return $query->where('tag', 'like', $key.'%');
    }


    //Defining Relationships
    public function words()
    {
        return $this->belongsToMany(Word::class);
    }
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }
    public function sentences()
    {
        return $this->belongsToMany(sentence::class);
    }
}
