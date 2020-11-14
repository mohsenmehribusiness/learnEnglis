<?php
namespace App\Traits;
use Illuminate\Support\Facades\Cache;

trait CacheTrait
{
    public function setCache($lists)
    {
       return Cache::store('file')->put('lists',$lists); // 10 Minutes
    }

    public function getCache()
    {
        return Cache::get('lists');
    }
}
