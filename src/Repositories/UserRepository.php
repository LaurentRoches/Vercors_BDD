<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Database;
use src\Models\User;

class UserRepository {

    private $DB;

    public function __construct() {
        $database = new Database();
        $this->DB = $database->getDB();
        require_once __DIR__.'/../../config.php';
    }

    public function createUser (User $user) {
        $password = hash("whirlpool", $user->getPasswordUser());
        $sql = "INSERT INTO ".PREFIXE."user VALUES (NULL,?,?,?,?,?,?,?,?);";
        $statement = $this->DB->prepare($sql);
        $retour = $statement->execute([
            $password,
            $user->getLastNameUser(),
            $user->getFirstNameUser(),
            $user->getTelUser(),
            $user->getAddressUser(),
            $user->getRoleUser(),
            $user->getRgpdUser(),
            $user->getEmailUser()
        ]);
        return $retour;
    }

    public function getAllUser (): array {
        $sql = "SELECT * FROM ".PREFIXE."user;";
        $statement = $this->DB->prepare($sql);
        $statement->execute();
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, User::class);
        return $retour;
    }

    public function getThisUserById (int $id): User {
        $sql = "SELECT * FROM ".PREFIXE."user WHERE id_user = :id;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":id" => $id
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $statement->fetch();
        return $retour;
    }

    public function getThisUserByMail (string $mail): User|bool {
        $sql = "SELECT * FROM ".PREFIXE."user WHERE email_user = :mail;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":mail" => $mail
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $statement->fetch();
        return $retour;
    }

    public function updateUser (User $user) {
        $sql = "UPDATE ".PREFIXE."user
                    SET
                        password_user = :password,
                        lastName_user = :lastName,
                        firstName_user = :firstName,
                        tel_user = :tel,
                        address_user = :address,
                        role_user = :role,
                        rgpd_user = :rgpd,
                        email_user = :email;";
        $statement = $this->DB->prepare($sql);
        $retour = $statement->execute([
            ":password" => $user->getPasswordUser(),
            ":lastName" => $user->getLastNameUser(),
            ":firstName" => $user->getFirstNameUser(),
            ":tel" => $user->getTelUser(),
            ":address" => $user->getAddressUser(),
            ":role" => $user->getRoleUser(),
            ":rgpd" => $user->getRgpdUser(),
            ":email" => $user->getEmailUser()
        ]);
        return $retour;
    }

    public function login(string $email, string $password) {

        $hash = hash("whirlpool", $password);

        try{
            $sql = "SELECT * FROM ".PREFIXE."user WHERE email_user = :email AND password_user = :password;";
            $statement = $this->DB->prepare($sql);
            $retour = $statement->execute([
                ":email" => $email,
                ":password" => $hash
            ]);
            return $retour;
        }catch (PDOException $error){
            //a changer plus tard
            var_dump($error);
        }
        while ($row = $retour->fetch(\PDO::FETCH_ASSOC)){
            $user = new User($row);
        }
        return $user;
    }

    // public function deleteUser (int $id) {
    //     try{
    //         $sql = "";
    //     }catch (PDOException $error){

    //     }
    // }
}