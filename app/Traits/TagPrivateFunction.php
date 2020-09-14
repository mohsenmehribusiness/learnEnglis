<?php


namespace App\Traits;


trait TagPrivateFunction
{
    private function productLetters(){
        $letters=array();
        $value=97;
        $key=65;

        for($i = 0 ; $i<=25;$i++)
            $letters=array_merge($letters,[chr($i+$key)=>chr($i+$value)]);

        return $letters;
    }
}
