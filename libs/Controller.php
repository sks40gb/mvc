<?php

class Controller {

    function __construct() {
        //echo 'Main controller<br />';
        $this->view = new View();
    }

    /**
     * 
     * @param string $name Name of the model
     * @param string $modelPath Location of the models
     */
    public function loadModel($name, $modelPath = MODEL_PATH) {
        $path = $modelPath . $name . "Model" . '.php';
        if (file_exists($path)) {
            require $modelPath . $name . "Model" . '.php';
            $modelName = $name . "Model";
            $this->model = new $modelName();
        }
    }

}
