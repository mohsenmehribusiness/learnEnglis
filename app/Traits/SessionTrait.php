<?php


namespace App\Traits;

trait SessionTrait
{
    public function setSession($data){
        session(['data' =>$data]);
    }

    public function getSession(){
        if(session()->has('data'))
            return  session('data');
        return null;
       // return \App\Word::all()->get();
    }
}
