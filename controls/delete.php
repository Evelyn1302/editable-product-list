<?php

    require('app.php');

    $products = Data::_get_product_list();                          //get all the products in the database

    if(isset($_POST['checkboxes'])){                                //if the checkbox is checked
        foreach ($products as $product) :                           //check, for each product in database
            if(in_array($product->sku, $_POST['checkboxes'])){      //if the checked product's sku is indentical to the one in database
                Data::_mass_delete($product->sku);                  //delete the product from database
            }
        endforeach;
    }

    Functions::_redirect("..");                                     //loads the Product List page

?>