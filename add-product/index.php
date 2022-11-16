<?php
    session_start();
    require('../controls/app.php');

    if(isset($_POST['save'])){                                      //if save button is clicked
        $type = $_POST['type-switcher'];                            //get the form type selected
        $posted_array = $type::_retrieve_data();                    //get all the input of form
        $validated_array = $type::_validate_data($posted_array);    //validate the input

        if (is_array($validated_array) === false) {                 //if validated input is not an array, return to Product Add page with error message
            Functions::_redirect("../index.php");
        }

        $products = Data::_get_product_list();                      //get all the products from database
        foreach ($products as $product):
            if($product->sku == $validated_array[0]){               //if posted sku is similar to any in the database
                Functions::_redirect("../index.php");               //load the Product List page without new product
            }
        endforeach;

        Data::_add_data($validated_array, $type);                   //add the valdated input to database
        Functions::_redirect("../index.php");                       //load the Product List page with new product
    }

    if(isset($_POST['type-switcher'])){                             //if the form type is changed
        $type = $_POST['type-switcher'];                            //get the type of form selected
        $form_type = $type::_display_mini_form();                   //get the name of the form selected

        //set the values of input to be the values before the form type is changed
        $_SESSION['sku'] = $_POST['sku'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['price'] = $_POST['price'];
        $_SESSION['size'] = '';
        $_SESSION['height'] = '';
        $_SESSION['width'] = '';
        $_SESSION['length'] = '';
        $_SESSION['weight'] = '';
    }
    else{                               //if no form type is selected
        //set the values of input to empty string
        $_SESSION['sku'] = '';
        $_SESSION['name'] = '';
        $_SESSION['price'] = '';

        $form_type = 'default';
    }

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Product Add</title>

        <link rel="stylesheet" href="../views/styles/main.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    </head>

    <body class="body">
        <form action="" method="POST">
            <div class="header">
                <div class="page_title">
                    <h1>Product Add</h1>
                </div>

                <div class="button_div">
                    <button class="button" name="save" type="submit">
                        Save
                    </button>    
                    <button class="button">
                        <a href="../index.php" class="button-link">
                            Cancel
                        </a>
                    </button>
                </div>
            </div>

            <div id="product_form">
                <div class="form-group">
                    <label class="form-control-name" for="sku">SKU:</label>
                    <input type="text" name="sku" id="sku" value="<?= $_SESSION['sku'] ?>" 
                            required oninvalid="this.setCustomValidity('Please, submit a valid SKU, in text form')" oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                    <label class="form-control-name" for="name">Name:</label>
                    <input type="text" name="name" id="name" value="<?= $_SESSION['name'] ?>" 
                            required oninvalid="this.setCustomValidity('Please, submit a valid name, in text form')" oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                    <label class="form-control-name" for="price">Price ($):</label>
                    <input type="number" name="price" id="price" step="0.01" min="0.00" value="<?= $_SESSION['price'] ?>" 
                            required oninvalid="this.setCustomValidity('Please submit a valid price in number form, up to two decimal places.')" oninput="setCustomValidity('')">
                </div>

                <?php
                    require(APP_PATH."views/$form_type.view.php");
                ?>
            </div>
        </form>
    </body>
</html>