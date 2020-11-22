<?php
namespace App\Http\Controllers;
use App\Tag;
use App\Traits\Cache\CacheTrait;
use App\Traits\Tag\tagOrderTrait;
use App\Traits\TagOrLessonPrivateFunction;

class TagController extends Controller
{
    use TagOrLessonPrivateFunction,CacheTrait,tagOrderTrait;
    public function index()
    {
        $objects=Tag::paginate(15);
        $general='tag';
        return view('tags.indexShowTable',compact('objects','general'));
    }
    public function tagLetter(){
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

    public function tagSentence($tag){
        $routes=$this->setRoutes();
        $this->setCacheQuery('newTagQuery',$tag);
        $this->changeChoose('sentences');
        $key='tag';
        $query=$tag;
        return redirect()->route('tag.tag',['tag'=>$tag]);
    }
    public function tagWord($tag){
        $routes=$this->setRoutes();
        $this->setCacheQuery('newTagQuery',$tag);
        $this->changeChoose('words');
        $key='tag';
        $query=$tag;
        return redirect()->route('tag.tag',['tag'=>$tag]);
    }
}
