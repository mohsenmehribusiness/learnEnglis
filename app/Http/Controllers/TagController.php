<?php
namespace App\Http\Controllers;
use App\Tag;
use App\Traits\TagPrivateFunction;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use TagPrivateFunction;

    public function index(){
        $objects=new Tag();
        $letters=$this->productLetters();
        $general='tag';
        return view('tags.index',compact('objects','letters','general'));
    }

    public function tag($tag){
       return Tag::whereTag($tag)->first();
    }
}
