<?php
namespace App\Traits;
use App\Detail;
use App\Word;

trait Study
{
    public function oldest(){
        return $this->words;
    }

}
