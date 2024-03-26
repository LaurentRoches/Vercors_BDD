<?php

namespace src\Models;

use src\Services\Hydratation;

class Night {

    private int $IdNight;
    private string $NameNight;
    private float $PriceNight;

    use Hydratation;

    /**
     * Get the value of IdNight
     */
    public function getIdNight(): int
    {
        return $this->IdNight;
    }

    /**
     * Set the value of IdNight
     */
    public function setIdNight(int $IdNight): self
    {
        $this->IdNight = $IdNight;

        return $this;
    }

    /**
     * Get the value of NameNight
     */
    public function getNameNight(): string
    {
        return $this->NameNight;
    }

    /**
     * Set the value of NameNight
     */
    public function setNameNight(string $NameNight): self
    {
        $this->NameNight = $NameNight;

        return $this;
    }

    /**
     * Get the value of PriceNight
     */
    public function getPriceNight(): float
    {
        return $this->PriceNight;
    }

    /**
     * Set the value of PriceNight
     */
    public function setPriceNight(float $PriceNight): self
    {
        $this->PriceNight = $PriceNight;

        return $this;
    }
}