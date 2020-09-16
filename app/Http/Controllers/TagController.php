<?php
namespace App\Http\Controllers;
use App\Tag;
use App\Traits\TagPrivateFunction;
use App\Word;
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
        $tag=Tag::FindTag($tag)->first();
        $words=$tag->words()->paginate(20);
        return view('study.index',compact('words'));
    }
}
