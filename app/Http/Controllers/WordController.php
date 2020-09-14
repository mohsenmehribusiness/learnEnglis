<?php
namespace App\Http\Controllers;
use App\Traits\ResponseAjax;
use App\Traits\Study;
use SweetAlert;

class WordController extends Controller
{
    use ResponseAjax,Study;
    public function index(){
        return view('index');
    }
}
