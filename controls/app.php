<?php

    define('APP_PATH', dirname(__FILE__) . '/../');             //set constant APP_PATH to the main folder

    require('products.php');
    require('config.php');
    require('functions/initializer_mini_form.class.php');

    Dvd::initialize(new DvdFunctions());                        //initialise Dvd product type related functions
    Furniture::initialize(new FurnitureFunctions());            //initialise Furniture product type related functions
    Book::initialize(new BookFunctions());                      //initialise Book product type related functions

    require('functions/initializer.class.php');

    Functions::initialize(new GeneralFunctions());              //initialise general functions
    Data::initialize(new MySql(CONFIG['db']));                  //initialise MySQL related functions

?>