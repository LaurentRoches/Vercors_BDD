<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Database;
use src\Models\Resa;

class ResaRepository {

    private $DB;

    public function __construct() {
        $database = new Database();
        $this->DB = $database->getDB();
        require_once __DIR__.'/../../config.php';
    }

    public function createResa (Resa $resa) {
        $sql = "INSERT INTO ".PREFIXE."resa VALUES (NULL, ?, ?, ?, ?, ?, ?);";
        $statement = $this->DB->prepare($sql);
        $retour = $statement->execute([
            $resa->isReducResa(),
            $resa->isKidsResa(),
            $resa->getHeadsetResa(),
            $resa->getSledResa(),
            $resa->getPriceResa(),
            $resa->getIdUser()
        ]);
        return $retour;
    }

    public function getAllResa () {
        $sql = "SELECT * FROM ".PREFIXE."resa;";
        $statement = $this->DB->prepare($sql);
        $statement->execute();
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, Resa::class);
        return $retour;
    }

    public function getThisResaById (int $id): Resa {
        $sql = "SELECT * FROM ".PREFIXE."user WHERE id_resa = :id;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":id" => $id
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, Resa::class);
        $retour = $statement->fetch();
        return $retour;
    }

    public function getAllResaByUserId(int $id) {
        $sql = "SELECT * FROM ".PREFIXE."resa WHERE id_user = :id;";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":id"=>$id
        ]);
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, Resa::class);
        return $retour;
    }

    public function updateThisResa (Resa $resa) {
        $sql = "UPDATE ".PREFIXE."resa
                    SET
                        reduc_resa = :reduc,
                        kids_resa = :kids,
                        headset_resa = :headset,
                        sled_resa = :sled,
                        price_resa = :price,
                        id_user = :idUser;";
        $statement = $this->DB->prepare($sql);
        $retour = $statement->execute([
            ":reduc" => $resa->isReducResa(),
            ":kids" => $resa->isKidsResa(),
            ":headset" => $resa->getHeadsetResa(),
            ":sled" => $resa->getSledResa(),
            ":price" => $resa->getPriceResa(),
            ":idUser" => $resa->getIdUser()
        ]);
        return $retour;
    }

    public function deleteThisResa (int $id) {
        try{
            $sql = "DELETE FROM come WHERE id_resa = :id;
                    DELETE FROM choice WHERE id_resa = :id;
                    DELETE FROM ".PREFIXE."resa WHERE id_resa = :id;";
            $statement = $this->DB->prepare($sql);
            $retour = $statement->execute([
                ":id" => $id
            ]);
            return $retour;
        }catch(PDOException $error){
            echo "Erreur de suppression : " . $error->getMessage();
            return FALSE;
        }
    }
}