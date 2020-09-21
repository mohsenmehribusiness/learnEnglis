<?php


namespace App\Traits;


trait QueryCacheFunctionsTrait
{
    public function setQuery($query){
        if(!cache('query')){
            cach(['query'=>$query],now()->addMinute(15));
        }
    }
}
