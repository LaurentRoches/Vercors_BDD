<?php

namespace src\Controllers;

use src\Models\Database;
use src\Models\Resa;
use src\Repositories\ResaRepository;
use src\Services\Reponse;

class ResaController
{

    use Reponse;


    public function addResa()
    {
        $data = file_get_contents("php://input");
        $resaTableau = (json_decode($data, true));
        if (!empty($resaTableau)) {
            $resaObjet = new Resa($resaTableau);

            $reducResa = $resaObjet->isReducResa();
            $kidsResa = $resaObjet->isKidsResa();
            $headSetResa = $resaObjet->getHeadsetResa();
            $sledResa = $resaObjet->getSledResa();
            $priceResa = $resaObjet->getPriceResa();
            $idUser = $resaObjet->getIdUser();

          
            // A REMPLIR AVEC LE TRAITEMENT 

            $dbConnexion = new Database();
            $ResaRepository = new ResaRepository($dbConnexion);

           
                if ($ResaRepository->createResa($resaObjet)) {
                    echo HOME_URL.'dashboard';
                    die();
                } else {
                    header('location: ' . HOME_URL . '?erreur=resa');
                    die();
                }
            }
        }
    }

