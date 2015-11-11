<?php

class View {

    function __construct() {
        //echo 'this is the view';
    }

    public function render($name, $useTemplate = true) {
         //set the js files, it will attach the js files in header section.
        $this->setJSFiles($name);
        
        //render the file
        if ($useTemplate) {
            require VIEWS.'header.php';
            require VIEWS . $name . '.php';
            require VIEWS.'footer.php';
        } else {
            require VIEWS. $name . '.php';
        }
    }
    
    /**
     * Read the js files from the js folder of the view page.
     * @param type $name - Name of the php view page.
     */
    private function setJSFiles($name) {
        $js_directory =  $this->getCurrentDirectory($name)."/js";
        require_once("util/FileUtil.php");
        $files = FileUtil::getFiles($js_directory);
        $js_files = array();
        foreach($files as $file){
            $js_files[] = $js_directory."/".$file;
        }
        $this->js_files = $js_files;
     //  print_r( $this->js_files);
    }

    
    /*
     * Get the current folder of the php view being rendered.
     */
    private function getCurrentDirectory($name){        
        $view_directory = $name;
        if (strpos($view_directory, '/') !== false) {
            $removeLastItemArray = explode("/", $view_directory); #array_pop();
            array_pop($removeLastItemArray);
            $view_directory = implode("/", $removeLastItemArray);           
        }
        return VIEWS.$view_directory;
    }
    
}
