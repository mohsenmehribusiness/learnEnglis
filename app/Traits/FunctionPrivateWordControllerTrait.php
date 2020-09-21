<?php

namespace App\Traits;
use App\Word;

trait FunctionPrivateWordControllerTrait
{
    public function oldest(){
        $words=Word::select('word','id')->orderBy('id', 'desc')->paginate(20);
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
}
