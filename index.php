<?php

require_once 'config.php';
require_once 'util/Auth.php';
require_once 'src/db/bootstrap.php';
require_once 'src/db/entity/BaseEntity.php';
require_once 'src/db/entity/User.php';
require_once 'libs/Bootstrap.php';
require_once 'libs/Controller.php';
require_once 'libs/Database.php';
require_once 'libs/Form.php';
require_once 'libs/Hash.php';
require_once 'libs/Model.php';
require_once 'libs/Session.php';
require_once 'libs/View.php';


// Also spl_autoload_register (Take a look at it if you like)
/*function __autoload($class) {
    require LIBS . $class .".php";
}*/

// Load the Bootstrap!
$bootstrap = new Bootstrap();

// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

$bootstrap->init();
