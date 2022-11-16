<?php
    session_start();
    require('controls/app.php');

    $products = Data::_get_product_list();          //get all the products in database
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Product List</title>

        <link rel="stylesheet" href="../views/styles/main.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    </head>

    <body class="body">
        <form action="../controls/delete.php" method="POST">
            <div class="header">
                <div class="page_title">
                    <h1>Product List</h1>
                </div>

                <div class="button_div">
                    <button class="button">
                        <a href="add-product" class="button-link">
                            ADD
                        </a>
                    </button>
                    <button class="button" type="submit" id="#delete-product-btn">
                        MASS DELETE
                    </button>
                </div>
            </div>

            <div class="container product-list">
                <?php
                    foreach ($products as $product) :
                ?>

                    <div class="product-div">
                        <input type="checkbox" class="delete-checkbox" name="checkboxes[]" value="<?= $product->sku ?>">
                        <div class="product-detail-div">
                            <p class="product-sku"><?= $product->sku ?></p>
                            <p class="product-name"><?= $product->name ?></p>
                            <p class="product-price"><?= $product->price ?> $</p>
                            <p class="product-detail"><?= $product->detail_name ?>: <?= $product->detail ?></p>
                        </div>
                    </div>
                
                <?php
                    endforeach;
                ?>
            </div>
        </form>
    </body>
</html>