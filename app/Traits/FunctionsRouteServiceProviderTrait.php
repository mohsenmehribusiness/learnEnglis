<?php


namespace App\Traits;


use Illuminate\Support\Facades\Route;

trait FunctionsRouteServiceProviderTrait
{

    public function mapTranslateRoutes() {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('translate')
            ->group(base_path('routes/web/translate.php'));
    }

    public function mapTagRoutes() {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('tags')
            ->group(base_path('routes/web/tag.php'));
    }

    public function mapLessonRoutes() {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('lessons')
            ->group(base_path('routes/web/lesson.php'));
    }

    public function mapExamRoutes() {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('exam')
            ->group(base_path('routes/web/exam.php'));
    }

    public function mapInsertRoutes() {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('insert')
            ->group(base_path('routes/web/insert.php'));
    }

    public function mapStudyRoutes() {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('study')
            ->group(base_path('routes/web/study.php'));
    }

    public function mapWordRoutes() {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('word')
            ->group(base_path('routes/web/word.php'));
    }

    public function mapSentenceRoutes() {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('sentence')
            ->group(base_path('routes/web/sentence.php'));
    }
}

