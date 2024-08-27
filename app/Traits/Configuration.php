<?php
namespace Modules\Product\Traits;

trait Configuration{

    //======================================================================
    public function module_path($name, $path = ''){
        $module = app('modules')->find($name);
        if(isset($module)){
            return $module->getPath().($path ? DIRECTORY_SEPARATOR.$path : $path);
        }else{
            return $path;
        }
    }
    //====================================================================== 
}