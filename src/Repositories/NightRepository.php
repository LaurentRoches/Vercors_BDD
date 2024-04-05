<?php

namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\Night;

class NightRepository
{

    private $DB;

    public function __construct()
    {
        $database = new Database();
        $this->DB = $database->getDB();
        require_once __DIR__ . '/../../config.php';
    }


    public function getAllNight()
    {
        $sql = "SELECT * FROM " . PREFIXE . "night;";
        $statement = $this->DB->prepare($sql);
        $statement->execute();
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, Night::class);
        return $retour;
    }

    public function getNightById(int $id): Night
    {
        $sql = "SELECT * FROM " . PREFIXE . "night WHERE id_night = :id;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([":id => $id"]);
        $statement->setFetchMode(PDO::FETCH_CLASS, Night::class);
        $retour = $statement->fetch();
        return $retour;
    }

    public function getNightByIdResa(int $id): array
    {
        $sql = "SELECT * FROM ".PREFIXE."night WHERE id_night IN(
                SELECT id_night FROM choice WHERE id_resa = :id);";
        $statement = $this->DB->prepare($sql);
        $statement->execute([":id => $id"]);
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, Night::class);
        return $retour;
    }

    public function creatNight(Night $night)
    {

        try {
            $stmt = $this->DB->prepare("INSERT INTO" . PREFIXE . " night VALUES (NULL,?,?)");
            $stmt->execute(
                $night->getNameNight(),
                $night->getPriceNight()
            );

            return $stmt->rowCount() == 1;
        } catch (\PDOException $e) {
            var_dump($e);
        }
    }
}
