<?php

namespace App\Models;
use InvalidArgumentException;

/**
 *  Clase Entidad
 * 
 * 
 */

class Product
{

    private int $id;
    private string $description;
    private float $price;

    public function __construct(
        int $id,
        string $description,
        float $price

    ) {
        $this->id = $id;
        $this->description = $description;
        $this->setPrice($price); // Validamos el precio
    }

    // ==================== GETTERS ====================

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    // ==================== SETTERS ====================

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setPrice(float $price): void
    {
        if ($price < 0) {
            throw new InvalidArgumentException("El precio no puede ser negativo");
        }
        $this->price = round($price, 2);
    }
}