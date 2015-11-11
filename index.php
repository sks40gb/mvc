<?php

require 'config.php';
require 'util/Auth.php';
require 'src/db/bootstrap.php';
require 'src/db/entity/Product.php';
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Database.php';
require 'libs/Form.php';
require 'libs/Hash.php';
require 'libs/Model.php';
require 'libs/Session.php';
require 'libs/View.php';


// Also spl_autoload_register (Take a look at it if you like)
/*function __autoload($class) {
    require LIBS . $class .".php";
}*/




 #<x> own <BEAN TYPE NAME> List 
    

 /*   $post = R::dispense( 'post' );
    $post->text2 = 'Hello World';

    $id = R::store( $post );          //Create or Update
    $post = R::load( 'post', $id );   //Retrieve
    echo $post;
  R::trash( $post );                //Delete
*/

// Load the Bootstrap!
$bootstrap = new Bootstrap();

// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

$bootstrap->init();


$product = new Product();
$product->setName("Kuamr");
$product->persist();
$product->flush();

echo "Created Product with ID " . $product->getId() . "\n";

 