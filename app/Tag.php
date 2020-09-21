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

    public function scopeFindTag($query,$tag){
        return $query->whereTag($tag);
    }

    public function scopeTagWords($query){
        return $query->whereUsage('word');
    }

    public function scopeTagStartLetter($query, $key){
        return $query->where('tag', 'like', $key.'%');
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
