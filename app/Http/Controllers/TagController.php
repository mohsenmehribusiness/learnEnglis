<?php
namespace App\Http\Controllers;
use App\Tag;
use App\Traits\CacheTrait;
use App\Traits\Tag\tagOrderTrait;
use App\Traits\TagPrivateFunction;

class TagController extends Controller
{
    use TagPrivateFunction,CacheTrait,tagOrderTrait;

    public function index(){
        $objects=new Tag();
        $letters=$this->productLetters();
        $general='tag';
        return view('tags.index',compact('objects','letters','general'));
    }

    public function tag($tag){
        $routes=$this->setRoutes();
        $this->setCacheQuery('newTagQuery',$tag);
        $key='tag';
        $query=$tag;
        return view('study.index',compact('key','query','routes'));
    }

    public function indexTable()
    {
        $objects=Tag::paginate(15);
        $general='tag';
        return view('tags.indexShowTable',compact('objects','general'));
    }
}
