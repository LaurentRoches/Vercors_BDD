<?php

namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class User {

    private int $IdUser;
    private string $PasswordUser;
    private string $LastNameUser;
    private string $FirstNameUser;
    private string $TelUser;
    private string $AddressUser;
    private string $RoleUser = "User";
    private DateTime $RgpdUser;
    private string $EmailUser;

    use Hydratation;



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

    /**
     * Get the value of PasswordUser
     */
    public function getPasswordUser(): string
    {
        return $this->PasswordUser;
    }

    /**
     * Set the value of PasswordUser
     */
    public function setPasswordUser(string $PasswordUser): self
    {
        $this->PasswordUser = $PasswordUser;

        return $this;
    }

    /**
     * Get the value of LastNameUser
     */
    public function getLastNameUser(): string
    {
        return $this->LastNameUser;
    }

    /**
     * Set the value of LastNameUser
     */
    public function setLastNameUser(string $LastNameUser): self
    {
        $this->LastNameUser = $LastNameUser;

        return $this;
    }

    /**
     * Get the value of FirstNameUser
     */
    public function getFirstNameUser(): string
    {
        return $this->FirstNameUser;
    }

    /**
     * Set the value of FirstNameUser
     */
    public function setFirstNameUser(string $FirstNameUser): self
    {
        $this->FirstNameUser = $FirstNameUser;

        return $this;
    }

    /**
     * Get the value of TelUser
     */
    public function getTelUser(): string
    {
        return $this->TelUser;
    }

    /**
     * Set the value of TelUser
     */
    public function setTelUser(string $TelUser): self
    {
        $this->TelUser = $TelUser;

        return $this;
    }

    /**
     * Get the value of AddressUser
     */
    public function getAddressUser(): string
    {
        return $this->AddressUser;
    }

    /**
     * Set the value of AddressUser
     */
    public function setAddressUser(string $AddressUser): self
    {
        $this->AddressUser = $AddressUser;

        return $this;
    }

    /**
     * Get the value of RoleUser
     */
    public function getRoleUser(): string
    {
        return $this->RoleUser;
    }

    /**
     * Set the value of RoleUser
     */
    public function setRoleUser(string $RoleUser): self
    {
        $this->RoleUser = $RoleUser;

        return $this;
    }

    /**
     * Get the value of RgpdUser
     */
    public function getRgpdUser(): string
    {
        return $this->RgpdUser->format('Y-m-d');
    }

    /**
     * Set the value of RgpdUser
     */
    public function setRgpdUser(string|DateTime $RgpdUser): void
    {
        if($RgpdUser instanceof DateTime) {
            $this->RgpdUser = $RgpdUser;
        } else {
            $this->RgpdUser = new DateTime($RgpdUser);
        }
    }

    /**
     * Get the value of EmailUser
     */
    public function getEmailUser(): string
    {
        return $this->EmailUser;
    }

    /**
     * Set the value of EmailUser
     */
    public function setEmailUser(string $EmailUser): self
    {
        $this->EmailUser = $EmailUser;

        return $this;
    }
}