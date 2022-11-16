<?php

    //define a class for general functions
    class GeneralFunctions {
        //loads the page with url $url
        public function _redirect($url) {
            header("Location: $url");
            die();
        }
    }

?>