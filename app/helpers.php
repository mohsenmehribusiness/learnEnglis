<?php
/**
 * @param $word
 * @param $relations
 * @param null $key
 * @return mixed
 */
function setValueArray($word, $relations, $key=null){
    $key= $key ?? rtrim($relations,"s");
    return ($word->$relations()->get())->implode($key, '-');
}
