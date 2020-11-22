<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    // usage = sentence|word|qa
    protected $fillable = ['state', 'star','repeat','usage','foreign_id'];
    protected $casts=['repeat'=>'integer'];
    public $timestamps=false;

    public function Word(){
        return $this->belongsTo(Word::class);
    }

    public function Sentence(){
        return $this->belongsTo(sentence::class);
    }
}
