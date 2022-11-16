<?php

    class MySql {
        //construct the database source
        public function __construct($db_source) {
            $this->source = $db_source;
        }


        //fetches products data from database
        public function _get_product_list() {
            $db = $this->_connect();        //connect to database using function from this class

            if ($db == null) {
                return [];                  //return empty array if there is no database connected
            }

            $query = $db->query('SELECT sku, name, price, detail, detail_name FROM products');      //query database
            $query_result = $query->fetchAll(PDO::FETCH_CLASS, 'Products');                         //fetches queried data

            $db = null;                     //free the variables
            $query = null;

            return $query_result;           //return query result
        }


        //insert products data into database
        public function _add_data($array, $product_type) {
            $db = $this->_connect();        //connect to database using function from this class

            if ($db == null) {
                return [];                  //return empty array if there is no database connected
            }

            $sql = $product_type::_prepare_sql();                                   //prepare product-specific sql query statement
            $smt = $db->prepare($sql);
            $smt->execute($product_type::_prepare_execute_add_data($array));        //execute product-specific sql statement

            $detail_name = $product_type::_detail_name();                           //get the label for product details

            //insert the newly added product to the products(main) table in the database
            $sql_main = 'INSERT INTO products (sku, name, price, detail, detail_name) VALUES (:sku, :name, :price, :detail, :detail_name)';
            $smt_main = $db->prepare($sql_main);
            $smt_main->execute([
                ':sku' => $array[0],
                ':name' => $array[1],
                ':price' => $array[2],
                ':detail' => $array[count($array)-1],
                ':detail_name' => $detail_name
            ]);

            $db = null;             //free the variables
            $smt = null;
            $sql = null;
            $smt_main = null;
            $sql_main = null;
        }


        //deletes products data from database
        public function _mass_delete($sku_delete) {
            $db = $this->_connect();        //connect to database using function from this class

            if ($db == null) {
                return [];                  //return empty array if there is no database connected
            }

            //an array of sql statements
            $sql_array = ['DELETE FROM products WHERE sku = :sku', 'DELETE FROM dvd WHERE sku = :sku', 'DELETE FROM furniture WHERE sku = :sku', 'DELETE FROM book WHERE sku = :sku'];
            
            //loop the sql statement to delete the products from all the tables in database
            foreach ($sql_array as $sql):
                $smt = $db->prepare($sql);

                $smt->execute([
                    ':sku' => $sku_delete
                ]);
            endforeach;

            $db = null;             //free the variables
            $smt = null;
            $sql = null;
        }


        //function to connect to database
        //only to be used in this class
        private function _connect() {
            try {
                return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
            }
            catch (PDOException $e) {
                return null;
            }
        }
    }

?>