<?php
namespace App\Traits;
use App\Word;
use Illuminate\Support\Facades\Cache;
trait CacheTrait
{
    public $choose;
    /**
     * @param $nameFunction
     * @param $filter
     * @return bool
     */
    public function setCacheQuery($nameFunction,$filter=null)
    {
        return Cache::store('file')->put('query',['nameFunction'=>$nameFunction,'filter'=>$filter,'choose'=>$this->getChooseInCache()]); // 10 Minutes
    }
    public function getCacheQuery()
    {
        return Cache::get('query');
    }
    public function getNameFunctionInCache()
    {
        return $this->getCacheQuery()["nameFunction"] ?? "defaultQuery";
    }
    public function defaultQuery($value=null)
    {
        return Word::query();
    }
    public function getModelInCache(){
        return $this->getCacheQuery()["model"];
    }
    public function getFilterInCache(){
        return $this->getCacheQuery()["filter"];
    }

    public function getChooseInCache()
    {
        return $this->getCacheQuery()["choose"]??"words";
    }

    public function setChoose()
    {
        $this->choose=$this->getCacheQuery()["choose"] ?? "words";
    }

    public function changeChoose($choose)
    {
        Cache::store('file')->put('query',
            [
                'nameFunction'=>$this->getNameFunctionInCache(),
                'filter'=>$this->getFilterInCache(),
                'choose'=>$choose
            ]);
        return back();
    }

    public function runQuery(){
        $this->setChoose();
        $nameFunction=$this->getNameFunctionInCache();
        return $this->$nameFunction($this->getFilterInCache());
    }
}
