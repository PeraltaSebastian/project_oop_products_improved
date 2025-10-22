<?php

/**
 * Products Controller
 * 
 * Controlador que maneja la lógica de listado de productos.
 * Obtiene los datos del repositorio y los pasa a la vista.
 * 
 */

namespace App\Controllers;

use App\Database\Db;
use App\Models\ProductRepository;
use Exception;

// Cargar configuración
require_once __DIR__ . '/../config/config_products.php';


// Inicializar variables para la vista
$products = [];
$errorMessage = null;



try {
    // Crear instancia de la base de datos
    $db = new Db();

    // Crear el repositorio de productos
    $productRepo = new ProductRepository($db);

    // Obtener todos los productos (ahora es mucho más simple)
    $products = $productRepo->findAll();

    // Cerrar conexión
    $db->close();
} catch (Exception $e) {
    // Capturar el mensaje de error para mostrarlo en la vista
    $errorMessage = "Error al cargar los productos: " . $e->getMessage();
    
    // En producción, registrar el error en un log
    // error_log($e->getMessage());
}

// Datos adicionales para la vista
$totalProducts = count($products);
// Incluir la vista
require_once __DIR__ . '/../../views/product_boot_list.php';
?>
