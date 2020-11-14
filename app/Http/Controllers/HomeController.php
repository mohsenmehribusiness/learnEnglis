<?php

namespace App\Http\Controllers;
use App\Traits\PrivateFunctionHomeControllerTrait;
use App\Traits\QueryCacheFunctionsTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use PrivateFunctionHomeControllerTrait,QueryCacheFunctionsTrait;
    public function index(){
       $details=$this->getDetails();
        $icons=$this->getIcons();
        $cc=2;
        return view('home.index',compact('details','icons','cc'));
    }
}
