<?php

require_once __DIR__ . '/../src/config/config_products.php';
require_once __DIR__ . '/../src/database/db.class.php';
require_once __DIR__ . '/../src/models/product.class.php';

use App\Models\Product;

$new_product=new Product(1000,'Fanta Zero',5000);


echo "Descripcion del producto ".$new_product->getDescription();
echo "<br>";
echo  "Precio : ".$new_product->getPrice();
echo "<br>";
echo $new_product->getId();

