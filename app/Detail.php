<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = ['state', 'star','repeat'];
    protected $casts=['repeat'=>'integer'];
    public $timestamps=false;
}
