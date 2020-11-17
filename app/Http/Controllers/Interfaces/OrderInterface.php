<?php


namespace App\Http\Controllers\Interfaces;


interface OrderInterface
{

    /**
     * @return mixed
     */
    public function setRoutes();
    /**
     * @return mixed
     */
    public  function  old($value=null);

    /**
     * @return mixed
     */
    public  function  AjaxQueryDataOld(\Illuminate\Http\Request $request);

    /**
     * @return mixed
     */
    public  function  new($value=null);

    /**
     * @return mixed
     */
    public  function  AjaxQueryDataNew(\Illuminate\Http\Request $request);


    /**
     * @return mixed
     */
    public  function StateCheck($value=null);

    /**
     * @return mixed
     */
    public  function  AjaxQueryDataStateCheck(\Illuminate\Http\Request $request);

    /**
     * @return mixed
     */
    public  function StateTimes($value=null);

    /**
     * @return mixed
     */
    public  function  AjaxQueryDataStateTimes(\Illuminate\Http\Request $request);
}
