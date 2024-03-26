<?php

namespace src\Models;

use src\Services\Hydratation;

class Come
{

    private int $IdPass;
    private int $IdResa;

    use Hydratation;


    /**
     * Get the value of IdPass
     */
    public function getIdPass(): int
    {
        return $this->IdPass;
    }

    /**
     * Set the value of IdPass
     */
    public function setIdPass(int $IdPass): self
    {
        $this->IdPass = $IdPass;

        return $this;
    }

    /**
     * Get the value of IdResa
     */
    public function getIdResa(): int
    {
        return $this->IdResa;
    }

    /**
     * Set the value of IdResa
     */
    public function setIdResa(int $IdResa): self
    {
        $this->IdResa = $IdResa;

        return $this;
    }
}