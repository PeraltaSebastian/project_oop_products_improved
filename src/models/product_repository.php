<?php

namespace App\Models;
use App\Database\Db;
/**
 *  Repositorio: Product
 * 
 */

class ProductRepository
{
    private Db $db;
    /**
     * Constructor: Instancia de la clase Db
     */
    public function __construct(Db $db) //ASIGNA        
    {
        $this->db = $db;
    }
    /**
     * Obtiene todos los productos
     * 
     * @return array Array de objetos Product
     */
    public function findAll(): array
    {
        $rows = $this->db->findAll('products', '*');

        return array_map(function ($row) {
            return $this->hydrate($row);
        }, $rows);
    }

    /**
     * Convierte un array en un objeto Product
     * 
     * @param array $row
     * @return Product
     */
    private function hydrate(array $row): Product
    {
        return new Product(
            (int)$row['id_product'],
            $row['product_name'],
            (float) $row['price']
        );
    }
}
