<?php


namespace App\Traits;

use App\Detail;
use App\Word;

trait Study
{
    public function oldest(){
        $words=Word::select('english','id')->orderBy('id', 'desc')->paginate(20);
        return view('study.index',compact('words'));
    }

    public function stateFalse(){
        $words=Word::select('english','id')->with('detail')
            ->whereHas('detail', function($query){
            $query->whereState('0');})
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('study.index',compact('words'));
    }

    public function stateTrue(){
        $words=Word::select('english','id')->with('detail')
            ->whereHas('detail', function($query){
                $query->whereState('1');})
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('study.index',compact('words'));
    }

    public function newest(){
        $words=Word::select('english','id')->orderBy('id', 'asc')->paginate(20);
        return view('study.index',compact('words'));
    }



}
