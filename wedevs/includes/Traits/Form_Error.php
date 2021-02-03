<?php
namespace wedevs\Traits;
/**
 * Error handler Traits
 * Trait Form_Error
 * @package wedevs\Traits
 */
trait Form_Error{
    /**
     * holds the error
     * @var array
     */
    public $error=array();
    /**
     * check if form have error
     * @param $key
     * @return bool
     */
    function has_error($key){
        return isset($this->error[$key])? true : false ;
    }

    /**
     * Get the error by key
     * @param $key
     * @return true|false
     */
    function get_error($key){
        if(isset($this->error[$key])){
            return $this->error[$key];
        }
        return  false;
    }
}