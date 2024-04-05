<?php

namespace src\Controllers;

use DateTime;
use src\Models\Database;
use src\Models\Resa;
use src\Repositories\ResaRepository;
use src\Services\Reponse;

class ResaController
{

    use Reponse;


    public function addResa()
    {

        $database = new Database;
        $idPass = '';
        $idNight = '';
        $total = 0;
        $kidResa = FALSE;

        //Vérification du nombre de réservation
        if (isset($_POST['nombrePlaces']) && is_numeric($_POST['nombrePlaces']) && !empty($_POST['nombrePlaces'])) {
            $nombrePlaces = (int) $_POST['nombrePlaces'];
            if ($nombrePlaces === 0) {
                header('location:' . HOME_URL . '?erreur=nbReservation');
                die();
            }
        }

        if (isset($_POST['tarifReduit'])) {
            $tarifReduit = htmlspecialchars($_POST['tarifReduit']);
        } else {
            $tarifReduit = FALSE;
        }

        if (isset($_POST['choixJour1'])) {
            $choixJour1 = htmlspecialchars($_POST['choixJour1']);
            $idPass = 1;
        }

        if (isset($_POST['choixJour2'])) {
            $choixJour2 = htmlspecialchars($_POST['choixJour2']);
            $idPass = 2;
        }

        if (isset($_POST['choixJour3'])) {
            $choixJour3 = htmlspecialchars($_POST['choixJour3']);
            $idPass = 3;
        }

        if (isset($_POST['choixJour12'])) {
            $choixJour12 = htmlspecialchars($_POST['choixJour12']);
            $idPass = 4;
        }

        if (isset($_POST['choixJour23'])) {
            $choixJour23 = htmlspecialchars($_POST['choixJour23']);
            $idPass = 5;
        }

        if (isset($_POST['pass1jour'])) {
            $pass1jour = htmlspecialchars($_POST['pass1jour']);
            $total = ($total + 40);
        }

        if (isset($_POST['pass1jourReduit'])) {
            $pass1jourReduit = htmlspecialchars($_POST['pass1jourReduit']);
            $total = ($total + 25);
        }

        if (isset($_POST['pass2jours'])) {
            $pass2jours = htmlspecialchars($_POST['pass2jours']);
            $total = ($total +  70);
        }

        if (isset($_POST['pass2joursReduit'])) {
            $pass2joursReduit = htmlspecialchars($_POST['pass2joursReduit']);
            $total = ($total + 50);
        }

        if (isset($_POST['pass3jours'])) {
            $pass3jours = htmlspecialchars($_POST['pass3jours']);
            $idPass = 6;
            $total = ($total + 100);
        }

        if (isset($_POST['pass3joursReduit'])) {
            $pass3joursReduit = htmlspecialchars($_POST['pass3joursReduit']);
            $idPass = 6;
            $total = ($total + 65);
        }

        if (isset($_POST['tenteNuit1'])) {
            $tenteNuit1 = htmlspecialchars($_POST['tenteNuit1']);
            $idNight = 1;
            $total = ($total + 5);
        }

        if (isset($_POST['tenteNuit2'])) {
            $tenteNuit2 = htmlspecialchars($_POST['tenteNuit2']);
            $idNight = 2;
            $total = ($total + 5);
        }

        if (isset($_POST['tenteNuit3'])) {
            $tenteNuit3 = htmlspecialchars($_POST['tenteNuit3']);
            $idNight = 3;
            $total = ($total + 5);
        }

        if (isset($_POST['tente3Nuits'])) {
            $tente3Nuits = htmlspecialchars($_POST['tente3Nuits']);
            $idNight = 4;
            $total = ($total + 12);
        }

        if (isset($_POST['vanNuit1'])) {
            $vanNuit1 = htmlspecialchars($_POST['vanNuit1']);
            $idNight = 5;
            $total = ($total + 5);
        }

        if (isset($_POST['vanNuit2'])) {
            $vanNuit2 = htmlspecialchars($_POST['vanNuit2']);
            $idNight = 6;
            $total = ($total + 5);
        }

        if (isset($_POST['vanNuit3'])) {
            $vanNuit3 = htmlspecialchars($_POST['vanNuit3']);
            $idNight = 7;
            $total = ($total + 5);
        }

        if (isset($_POST['van3Nuits'])) {
            $van3Nuits = htmlspecialchars($_POST['van3Nuits']);
            $idNight = 8;
            $total = ($total + 12);
        }

        if (isset($_POST['enfantsOui'])) {
            $enfantsOui = htmlspecialchars($_POST['enfantsOui']);
            $kidResa = TRUE;
        }

        if (isset($_POST['enfantsNon'])) {
            $enfantsNon = htmlspecialchars($_POST['enfantsNon']);
            $kidResa = FALSE;
        }

        if (isset($_POST['nombreCasquesEnfants']) && is_numeric($_POST['nombreCasquesEnfants'])) {
            $nombreCasquesEnfants = htmlspecialchars($_POST['nombreCasquesEnfants']);
            $total = ($total + ((int)$nombreCasquesEnfants * 2));
        } else if (empty($_POST['nombreCasquesEnfants'])) {
            $nombreCasquesEnfants = htmlspecialchars($_POST['nombreCasquesEnfants']);
        }

        if (isset($_POST['NombreLugesEte']) && is_numeric($_POST['NombreLugesEte'])) {
            $NombreLugesEte = htmlspecialchars($_POST['NombreLugesEte']);
            $total = ($total + ((int)$NombreLugesEte * 5));
        } else if (empty($_POST['NombreLugesEte'])) {
            $NombreLugesEte = htmlspecialchars($_POST['NombreLugesEte']);
        }
        $user = unserialize($_SESSION['user']);
        $idUser = $user->getIdUser();
        $tableauResa = [
            "ReducResa" => $tarifReduit,
            "KidsResa" =>  $kidResa,
            "HeadsetResa" => (int)$nombreCasquesEnfants,
            "SledResa" => (int)$NombreLugesEte,
            "PriceResa" => $total,
            "IdUser" => $idUser
        ];
        $date = new DateTime();
        $dateString = $date->format('Y-m-d H:i:s');
        $newResa = new Resa($tableauResa);
        $resaRepository = new ResaRepository($database);
        if ($resaRepository->createResa($newResa, $idPass, $idNight, $dateString)) {
            $to      = 'tonie.lanquette1@gmail.com';
            $subject = 'le sujet';
            $message = 'Bonjour ! ça fonctionne !';
            $headers = 'From: email@envoi.fr' . "\r\n" .
                'Reply-To: email@envoi.fr' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            $test = mail($to, $subject, $message, $headers);

            if ($test) {
                echo "le mail a bien été envoyé.";
                header('location: ' . HOME_URL . 'dashboard');
                die();
            } else {
                echo "le mail n'a pas bien été envoyé.";
                var_dump($test);
                die();
            }
        } else {
            header('location: ' . HOME_URL . 'dashboard?erreur=reservation');
            die();
        }
    }
}
