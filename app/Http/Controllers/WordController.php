<?php
namespace App\Http\Controllers;
use App\Traits\ResponseAjax;
use App\Traits\Translate;
use App\Traits\Study;
use SweetAlert;

class WordController extends Controller
{
    use ResponseAjax,Translate,Study;
    public function index(){
        return view('index');
    }
}
