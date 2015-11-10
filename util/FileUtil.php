<?php

/**
 * Description of FileUtil
 *
 * @author sunsingh
 */
class FileUtil {

    public function __construct() {
        
    }

    /*
     *  returns array of files and folders within the directory. 
     */
    public static function getFiles($dir, $extension = null) {
        $files = array();
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {                   
                    if($file != "." && $file != ".."){
                        $files[] = $file;
                    }
                }
                closedir($dh);
            }
        }
        return $files;
    }

}
