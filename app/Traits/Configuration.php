<?php
namespace Modules\Setting\Traits;

trait Configuration{
    //this trait act like override module_path in laravel_module helper
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