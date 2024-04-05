<?php

namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\Pass;

class PassRepository
{

    private $DB;

    public function __construct()
    {
        $database = new Database();
        $this->DB = $database->getDB();
        require_once __DIR__ . '/../../config.php';
    }


    public function getAllPass()
    {
        $sql = "SELECT * FROM " . PREFIXE . "pass;";
        $statement = $this->DB->prepare($sql);
        $statement->execute();
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, Pass::class);
        return $retour;
    }

    public function getPassById(int $id): Pass
    {
        $sql = "SELECT * FROM " . PREFIXE . "pass WHERE id_pass = :id;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([":id => $id"]);
        $statement->setFetchMode(PDO::FETCH_CLASS, Pass::class);
        $retour = $statement->fetch();
        return $retour;
    }

    public function getPassByIdTache(int $id): array
    {
        $sql = "SELECT * FROM ".PREFIXE."pass WHERE id_pass IN(
                SELECT id_pass FROM come WHERE id_resa = :id);";
        $statement = $this->DB->prepare($sql);
        $statement->execute([":id => $id"]);
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, Pass::class);
        return $retour;
    }
}
