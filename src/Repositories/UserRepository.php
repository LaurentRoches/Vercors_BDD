<?php

namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\User;

class UserRepository {

    private $DB;

    public function __construct() {
        $database = new Database();
        $this->DB = $database->getDB();
        require_once __DIR__.'/../../config.php';
    }

    public function getAllUser (): User {
        $sql = "SELECT * FROM ".PREFIXE."user;";
        $statement = $this->DB->prepare($sql);
        $statement->execute();
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, User::class);
        return $retour;
    }

    public function getThisUserById (int $id): User {
        $sql = "SELECT * FROM ".PREFIXE."user WHERE user_id = :id;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":id" => $id
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $statement->fetch();
        return $retour;
    }

    public function getThisUserByMail (int $mail): User {
        $sql = "SELECT * FROM ".PREFIXE."user WHERE user_mail = :mail;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":mail" => $mail
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $statement->fetch();
        return $retour;
    }

    public
}