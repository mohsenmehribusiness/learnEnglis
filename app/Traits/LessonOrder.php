<?php


namespace App\Traits;


trait LessonOrder
{
    public $routes=null;
    public $value=null;
    /**
     * @inheritDoc
     */
    public function setRoutes(){
        $this->routes["ajax"]="lesson.data.old";
        $this->routes["old"]="lesson.old";
        $this->routes["new"]="lesson.new";
        $this->routes["stateCheck"]="lesson.state.check";
        $this->routes["stateTimes"]="lesson.state.times";
    }

    /**
     * @inheritDoc
     */
    public function old($vlue = null)
    {
        // TODO: Implement old() method.
    }

    /**
     * @inheritDoc
     */
    public function AjaxQueryDataOld(\Illuminate\Http\Request $request)
    {
        // TODO: Implement AjaxQueryDataOld() method.
    }

    /**
     * @inheritDoc
     */
    public function new($value = null)
    {
        // TODO: Implement new() method.
    }

    /**
     * @inheritDoc
     */
    public function AjaxQueryDataNew(\Illuminate\Http\Request $request)
    {
        // TODO: Implement AjaxQueryDataNew() method.
    }

    /**
     * @inheritDoc
     */
    public function StateCheck($value = null)
    {
        // TODO: Implement StateCheck() method.
    }

    /**
     * @inheritDoc
     */
    public function AjaxQueryDataStateCheck(\Illuminate\Http\Request $request)
    {
        // TODO: Implement AjaxQueryDataStateCheck() method.
    }

    /**
     * @inheritDoc
     */
    public function StateTimes($value = null)
    {
        // TODO: Implement StateTimes() method.
    }

    /**
     * @inheritDoc
     */
    public function AjaxQueryDataStateTimes(\Illuminate\Http\Request $request)
    {
        // TODO: Implement AjaxQueryDataStateTimes() method.
    }

}
