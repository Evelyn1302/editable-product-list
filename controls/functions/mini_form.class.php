<?php

    //creates an abstract class for mini form display
    abstract class MiniForm {
        abstract public function _display_mini_form();              //returns the form type selected
        abstract public function _retrieve_data();                  //get all the input posted
        abstract public function _validate_data($posted_array);     //validate the posted input
        abstract public function _prepare_sql();                    //prepares sql statement
        abstract public function _prepare_execute_add_data($array); //prepares execute statement
        abstract public function _detail_name();                    //returns the label for product details
    }


    //class the contains functions for Dvd product type
    //extends the MiniForm abstract class
    class DvdFunctions extends MiniForm {
        public function _display_mini_form() {
            return "dvd";
        }

        public function _retrieve_data() {
            $posted_sku = $_POST['sku'];
            $posted_name = $_POST['name'];
            $posted_price = $_POST['price'];
            $posted_size = $_POST['size'];

            $posted_array = [$posted_sku, $posted_name, $posted_price, $posted_size];
            return $posted_array;
        }

        public function _validate_data($posted_array) {
            $sanitized_sku = htmlspecialchars($posted_array[0]);
            $sanitized_name = htmlspecialchars($posted_array[1]);
            $sanitized_price = filter_var($posted_array[2], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $sanitized_size = filter_var($posted_array[3], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            if (((!filter_var($sanitized_price, FILTER_VALIDATE_FLOAT) === false) || (filter_var($sanitized_price, FILTER_VALIDATE_FLOAT) == 0.0)) && 
                (!filter_var($sanitized_size, FILTER_VALIDATE_FLOAT) === false)) {
                $validated_price = $sanitized_price;
                $validated_size = $sanitized_size;

                $validated_array = [$sanitized_sku, $sanitized_name, $validated_price, $validated_size];
                return $validated_array;
            }
            else {
                $error_message = 'The input type for price or size is not valid.';
                return $error_message;
            }
        }

        public function _prepare_sql() {
            return 'INSERT INTO dvd (sku, name, price, size) VALUES (:sku, :name, :price, :size)';
        }

        public function _prepare_execute_add_data($array) {
            return [':sku' => $array[0],
                    ':name' => $array[1],
                    ':price' => $array[2],
                    ':size' => $array[3]];
        }

        public function _detail_name() {
            return 'Size (MB)';
        }
    }


    //class the contains functions for Furniture product type
    //extends the MiniForm abstract class
    class FurnitureFunctions extends MiniForm {
        public function _display_mini_form() {
            return "furniture";
        }

        public function _retrieve_data() {
            $posted_sku = $_POST['sku'];
            $posted_name = $_POST['name'];
            $posted_price = $_POST['price'];
            $posted_height = $_POST['height'];
            $posted_width = $_POST['width'];
            $posted_length = $_POST['length'];
            $dimension = $posted_height."x".$posted_width."x".$posted_length;

            $posted_array = [$posted_sku, $posted_name, $posted_price, $posted_height, $posted_width, $posted_length, $dimension];
            return $posted_array;
        }

        public function _validate_data($posted_array) {
            $sanitized_sku = htmlspecialchars($posted_array[0]);
            $sanitized_name = htmlspecialchars($posted_array[1]);
            $sanitized_price = filter_var($posted_array[2], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $sanitized_height = filter_var($posted_array[3], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $sanitized_width = filter_var($posted_array[4], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $sanitized_length = filter_var($posted_array[5], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            if (((!filter_var($sanitized_price, FILTER_VALIDATE_FLOAT) === false) || (filter_var($sanitized_price, FILTER_VALIDATE_FLOAT) == 0.0)) && 
                (!filter_var($sanitized_height, FILTER_VALIDATE_FLOAT) === false) &&
                (!filter_var($sanitized_width, FILTER_VALIDATE_FLOAT) === false) &&
                (!filter_var($sanitized_length, FILTER_VALIDATE_FLOAT) === false)) {
                $validated_price = $sanitized_price;
                $validated_height = $sanitized_height;
                $validated_width = $sanitized_width;
                $validated_length = $sanitized_length;

                $validated_array = [$sanitized_sku, $sanitized_name, $validated_price, $validated_height, $validated_width, $validated_length, $posted_array[6]];
                return $validated_array;
            }
            else {
                $error_message = 'The input type for price or one of the dimensions is not valid.';
                return $error_message;
            }
        }

        public function _prepare_sql() {
            return 'INSERT INTO furniture (sku, name, price, height, width, length, dimension) VALUES (:sku, :name, :price, :height, :width, :length, :dimension)';
        }

        public function _prepare_execute_add_data($array) {
            return [':sku' => $array[0],
                    ':name' => $array[1],
                    ':price' => $array[2],
                    ':height' => $array[3],
                    ':width' => $array[4],
                    ':length' => $array[5],
                    ':dimension' => $array[6]];
        }

        public function _detail_name() {
            return 'Dimensions (HxWxL)';
        }
    }


    //class the contains functions for Book product type
    //extends the MiniForm abstract class
    class BookFunctions extends MiniForm {
        public function _display_mini_form() {
            return "book";
        }

        public function _retrieve_data() {
            $posted_sku = $_POST['sku'];
            $posted_name = $_POST['name'];
            $posted_price = $_POST['price'];
            $posted_weight = $_POST['weight'];

            $posted_array = [$posted_sku, $posted_name, $posted_price, $posted_weight];
            return $posted_array;
        }

        public function _validate_data($posted_array) {
            $sanitized_sku = htmlspecialchars($posted_array[0]);
            $sanitized_name = htmlspecialchars($posted_array[1]);
            $sanitized_price = filter_var($posted_array[2], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $sanitized_weight = filter_var($posted_array[3], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            if (((!filter_var($sanitized_price, FILTER_VALIDATE_FLOAT) === false) || (filter_var($sanitized_price, FILTER_VALIDATE_FLOAT) == 0.0)) && 
                (!filter_var($sanitized_weight, FILTER_VALIDATE_FLOAT) === false)) {
                $validated_price = $sanitized_price;
                $validated_weight = $sanitized_weight;

                $validated_array = [$sanitized_sku, $sanitized_name, $validated_price, $validated_weight];
                return $validated_array;
            }
            else {
                $error_message = 'The input type for price or weight is not valid.';
                return $error_message;
            }
        }

        public function _prepare_sql() {
            return 'INSERT INTO book (sku, name, price, weight) VALUES (:sku, :name, :price, :weight)';
        }

        public function _prepare_execute_add_data($array) {
            return [':sku' => $array[0],
                    ':name' => $array[1],
                    ':price' => $array[2],
                    ':weight' => $array[3]];
        }

        public function _detail_name() {
            return 'Weight (kg)';
        }
    }

?>