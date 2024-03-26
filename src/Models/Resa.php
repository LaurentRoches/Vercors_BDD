<?php 

namespace src\Models;

use src\Services\Hydratation;

class Resa {

private int $IdResa;
private  bool $ReducResa;
private bool $KidsResa;
private int $HeadsetResa;
private int $SledResa;
private float $PriceResa;
private int $IdUser;

use Hydratation;


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
 * Get the value of ReducResa
 */
public function isReducResa(): bool
{
return $this->ReducResa;
}

/**
 * Set the value of ReducResa
 */
public function setReducResa(bool $ReducResa): self
{
$this->ReducResa = $ReducResa;

return $this;
}

/**
 * Get the value of KidsResa
 */
public function isKidsResa(): bool
{
return $this->KidsResa;
}

/**
 * Set the value of KidsResa
 */
public function setKidsResa(bool $KidsResa): self
{
$this->KidsResa = $KidsResa;

return $this;
}

/**
 * Get the value of HeadsetResa
 */
public function getHeadsetResa(): int
{
return $this->HeadsetResa;
}

/**
 * Set the value of HeadsetResa
 */
public function setHeadsetResa(int $HeadsetResa): self
{
$this->HeadsetResa = $HeadsetResa;

return $this;
}

/**
 * Get the value of SledResa
 */
public function getSledResa(): int
{
return $this->SledResa;
}

/**
 * Set the value of SledResa
 */
public function setSledResa(int $SledResa): self
{
$this->SledResa = $SledResa;

return $this;
}

/**
 * Get the value of PriceResa
 */
public function getPriceResa(): float
{
return $this->PriceResa;
}

/**
 * Set the value of PriceResa
 */
public function setPriceResa(float $PriceResa): self
{
$this->PriceResa = $PriceResa;

return $this;
}

/**
 * Get the value of IdUser
 */
public function getIdUser(): int
{
return $this->IdUser;
}

/**
 * Set the value of IdUser
 */
public function setIdUser(int $IdUser): self
{
$this->IdUser = $IdUser;

return $this;
}
}