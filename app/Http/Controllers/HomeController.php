<?php
namespace App\Http\Controllers;
use App\Traits\getDetailsTrait;
class HomeController extends Controller
{
    use getDetailsTrait;
    public function index(){
       $details=$this->getDetails();
       return view('home.index',compact('details'));
    }
}
