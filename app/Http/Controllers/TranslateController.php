<?php

namespace App\Http\Controllers;

use App\Traits\Translate;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    use Translate;

    public function index(){
        return view('translate.index');
    }
}
