<?php

namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class Choice {

    private int $IdNight;
    private int $IdResa;
    private DateTime $DateChoice;

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

    /**
     * Get the value of DateChoice
     */
    public function getDateChoice(): DateTime
    {
        return $this->DateChoice;
    }

    /**
     * Set the value of DateChoice
     */
    public function setDateChoice(DateTime $DateChoice): self
    {
        $this->DateChoice = $DateChoice;

        return $this;
    }
}