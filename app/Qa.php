<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Qa extends Model
{
    protected $table='qa';

    protected $fillable=['id','description','title','questions','answers'];
    public $timestamps=false;
    protected $casts=['questions'=>'array','answers'=>'array'];
    private function getSentences($idLists)
    {
        return (sentence::find($idLists))->pluck('word');
    }
    public function getQuestions()
    {
        return $this->getSentences($this->questions);
    }
    public function getAnswers()
    {
        return $this->getSentences($this->answers);
    }
    private static function saveSentences($sentences)
    {
        $listID=array();
        foreach ($sentences as $sentence){
            array_push($listID,(sentence::firstOrCreate(['word'=>$sentence]))->id);
        }
        return $listID;

    }
    public static function saveQuestions($sentences)
    {
        return self::saveSentences($sentences);
    }
    public static function saveAnswers($sentences)
    {
        return self::saveSentences($sentences);
    }
    // Defining Relationships ...
    public function detail(){
        return $this->hasOne(Detail::class, 'foreign_id');
    }
    public function lessons(){
        return $this->belongsToMany(Lesson::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
