<?php

    require('general.class.php');
    require('mysql.class.php');

    //to initialise all functions in GeneralFunctions
    //to set all functions in GeneralFunctions to static
    class Functions {
        static private $fp;             //functions provider

        static public function initialize($functions_provider) {
            return self::$fp = $functions_provider;
        }

        static public function _redirect($url){
            return self::$fp->_redirect($url);
        }
    }


    //to initialise all functions in MySql
    //to set all functions in MySql to static
    class Data {
        static private $fp;

        static public function initialize($functions_provider) {
            return self::$fp = $functions_provider;
        }

        static public function _get_product_list() {
            return self::$fp->_get_product_list();
        }

        static public function _add_data($array, $product_type) {
            return self::$fp->_add_data($array, $product_type);
        }

        static public function _mass_delete($sku_delete) {
            return self::$fp->_mass_delete($sku_delete);
        }
    }

?>