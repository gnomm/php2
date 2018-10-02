<?php

namespace app\services;


class Autoloader
{
    public $fileExtension = ".php";

    public function loadClass($className)
    {
        $filename = str_replace(['app\\', "\\", "/"], [ROOT_DIR, DS, DS], $className);
        $filename .= $this->fileExtension;

        if (file_exists($filename)) {
            include $filename;
        }
    }
}


