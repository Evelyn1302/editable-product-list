<?php

    require('mini_form.class.php');

    //to initialise all functions in Dvd
    //to set all functions in Dvd to static
    class Dvd {
        static private $fp;

        static public function initialize($functions_provider) {
            return self::$fp = $functions_provider;
        }

        static public function _display_mini_form(){
            return self::$fp->_display_mini_form();
        }

        static public function _retrieve_data(){
            return self::$fp->_retrieve_data();
        }

        static public function _validate_data($posted_array){
            return self::$fp->_validate_data($posted_array);
        }

        static public function _prepare_sql(){
            return self::$fp->_prepare_sql();
        }

        static public function _prepare_execute_add_data($array){
            return self::$fp->_prepare_execute_add_data($array);
        }

        static public function _detail_name(){
            return self::$fp->_detail_name();
        }
    }


    //to initialise all functions in Furniture
    //to set all functions in Furniture to static
    class Furniture {
        static private $fp;

        static public function initialize($functions_provider) {
            return self::$fp = $functions_provider;
        }

        static public function _display_mini_form(){
            return self::$fp->_display_mini_form();
        }

        static public function _retrieve_data(){
            return self::$fp->_retrieve_data();
        }

        static public function _validate_data($posted_array){
            return self::$fp->_validate_data($posted_array);
        }

        static public function _prepare_sql(){
            return self::$fp->_prepare_sql();
        }

        static public function _prepare_execute_add_data($array){
            return self::$fp->_prepare_execute_add_data($array);
        }

        static public function _detail_name(){
            return self::$fp->_detail_name();
        }
    }


    //to initialise all functions in Book
    //to set all functions in Book to static
    class Book {
        static private $fp;

        static public function initialize($functions_provider) {
            return self::$fp = $functions_provider;
        }

        static public function _display_mini_form(){
            return self::$fp->_display_mini_form();
        }

        static public function _retrieve_data(){
            return self::$fp->_retrieve_data();
        }

        static public function _validate_data($posted_array){
            return self::$fp->_validate_data($posted_array);
        }

        static public function _prepare_sql(){
            return self::$fp->_prepare_sql();
        }

        static public function _prepare_execute_add_data($array){
            return self::$fp->_prepare_execute_add_data($array);
        }

        static public function _detail_name(){
            return self::$fp->_detail_name();
        }
    }

?>