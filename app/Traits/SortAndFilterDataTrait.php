<?php

namespace App\Traits;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

Trait SortAndFilterDataTrait{
    public function oldest(){
        $words=$this->getSession();
        $collection=collect($words->toArray());
        $collection=$collection->map(function ($item){
            return collect($item);
        });
        return $collection->sortBy('word');
        $words=$this->paginate($words,12);
        return view('study.index',compact('words'));
    }

    public function stateFalse(){
        $words=Word::select('word','id')->with('detail')
            ->whereHas('detail', function($query){
                $query->whereState('0');})
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('study.index',compact('words'));
    }

    public function stateTrue(){
        $words=Word::select('word','id')->with('detail')
            ->whereHas('detail', function($query){
                $query->whereState('1');})
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('study.index',compact('words'));
    }

    public function newest(){
        $words=Word::select('word','id')->orderBy('id', 'asc')->paginate(20);
        return view('study.index',compact('words'));
    }


    /**
     * @param $items
     * @param int $perPage
     * @param null $page
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
