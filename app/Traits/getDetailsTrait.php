<?php
namespace App\Traits;
use App\Detail;
use App\Lesson;
use App\sentence;
use App\Tag;
use App\Word;
trait getDetailsTrait
{
    private function getDetails()
    {
        return [
            'words' => [Word::all()->count(), 'fa-file-word-o', 'word.index'],
            'sentences' => [sentence::all()->count(), 'fa-graduation-cap', 'sentence.index'],
            'tags' => [Tag::all()->count(), 'fa-tag', 'tag.index'],
            'lessons' => [Lesson::all()->count(), 'fa-quote-right', 'lesson.index'],
            'repeat' => [Detail::select('repeat')->sum('repeat'), 'fa-repeat', 'exam.index']
        ];
    }
}
