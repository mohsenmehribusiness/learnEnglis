<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = ['state', 'star','repeat','usage','foreign_id'];
    protected $casts=['repeat'=>'integer'];
    public $timestamps=false;

    public function Word(){
        return $this->belongsTo(Word::class);
    }

    public function AllWordsStateTrue(){
        return $this->Word();
    }

    public function Sentence(){
        return $this->belongsTo(sentence::class);
    }
}
