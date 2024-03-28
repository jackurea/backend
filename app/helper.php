<?php

if(! function_exists('includeRouteFile')) {
    function includeRouteFile($folder) {
        try {
            $f = new recursiveDirectoryIterator($folder);
            $d = new recursiveIteratorIterator($f);
    
            while($d->valid()) {
                if(!$d->isDot() && $d->isFile() && $d->isReadable() && $d->current()->getExtension() === 'php') {
                    require $d->key();
                }
                $d->next();
            }    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}