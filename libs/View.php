<?php

class View {

    function __construct() {
        //echo 'this is the view';
    }

    public function render($name, $useTemplate = true) {
        if ($useTemplate) {
            require 'views/header.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';           
        } else {
             require 'views/' . $name . '.php';
        }
    }

}
