<?php

namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class Pass{

    private int $IdPass;
    private string $NamePass;
    private float $PricePass;
    private float $PriceReducePass;
    private DateTime $DatePass;

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
     * Get the value of NamePass
     */
    public function getNamePass(): string
    {
        return $this->NamePass;
    }

    /**
     * Set the value of NamePass
     */
    public function setNamePass(string $NamePass): self
    {
        $this->NamePass = $NamePass;

        return $this;
    }

    /**
     * Get the value of PricePass
     */
    public function getPricePass(): float
    {
        return $this->PricePass;
    }

    /**
     * Set the value of PricePass
     */
    public function setPricePass(float $PricePass): self
    {
        $this->PricePass = $PricePass;

        return $this;
    }

    /**
     * Get the value of PriceReducePass
     */
    public function getPriceReducePass(): float
    {
        return $this->PriceReducePass;
    }

    /**
     * Set the value of PriceReducePass
     */
    public function setPriceReducePass(float $PriceReducePass): self
    {
        $this->PriceReducePass = $PriceReducePass;

        return $this;
    }

    /**
     * Get the value of DatePass
     */
    public function getDatePass(): DateTime
    {
        return $this->DatePass;
    }

    /**
     * Set the value of DatePass
     */
    public function setDatePass(DateTime $DatePass): self
    {
        $this->DatePass = $DatePass;

        return $this;
    }
}