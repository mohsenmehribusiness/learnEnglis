<?php

namespace App\Http\Controllers;
use App\Traits\PrivateFunctionHomeControllerTrait;
use App\Traits\QueryCacheFunctionsTrait;

class HomeController extends Controller
{
    use PrivateFunctionHomeControllerTrait,QueryCacheFunctionsTrait;
    public function index(){
       $details=$this->getDetails();
        $icons=$this->getIcons();
        return view('home.index',compact('details','icons'));
    }
}
