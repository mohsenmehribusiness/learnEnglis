<?php
namespace App\Http\Controllers;
use App\Traits\Translate\Translate;
class TranslateController extends Controller
{
    use Translate;
    public function index(){
        return view('translate.index');
    }
}
