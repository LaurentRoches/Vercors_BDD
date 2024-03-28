<?php

use src\Models\Database;
use src\Models\User;
use src\Repositories\UserRepository;

session_start();

require __DIR__ . "/../../autoload.php";


if (isset($_POST)) {
    $data = file_get_contents("php://input");
    $userTableau = (json_decode($data, true));
    $userObjet = new User();

    $lastName = $userObjet->getLastNameUser();
    $firstName = $userObjet->getFirstNameUser();
    $address = $userObjet->getAddressUser();
    $tel = $userObjet->getTelUser();
    $email = $userObjet->getEmailUser();
    $password = $userObjet->getPasswordUser();
    $rgpd = $userObjet->getRgpdUser();


    if (validateData($lastName, $firstName, $address, $tel, $email, $password, $rgpd)) {
        $dbConnexion = new Database();
        $userRepository = new UserRepository();

        if ($UserRepository->getThisUserByMail($mail)) {
            echo "email déjà utilisé";
        } else {
            if ($UserRepository->creatUser($userObjet)) {
                echo "succes";
            } else {
                echo "erreur enregistrement";
            }
        }
    }
}


function validateData($lastName, $firstName, $address, $tel, $email, $password, $rgpd)
{
    if (isset($lastName) && !empty($lastName)) {
        $lastName = htmlspecialchars($lastName);

        if (isset($firstName) && !empty($firstName)) {
            $firstName = htmlspecialchars($firstName);

            if (isset($address) && !empty($address)) {
                $address = htmlspecialchars($address);

                if (isset($tel) && !empty($tel)) {
                    $tel = htmlspecialchars($tel);

                    if (isset($email) && !empty($email)) {
                        $email = htmlspecialchars($email);

                        if (isset($password) && !empty($password)) {
                            $password = htmlspecialchars($password);

                            if (isset($rgpd) && !empty($rgpd)) {
                                $rgpd = htmlspecialchars($rgpd);
                            } else {
                                echo "erreur rgpd";
                            }
                        } else {
                            echo "erreur password";
                        }
                    } else {
                        echo "erreur email";
                    }
                } else {
                    echo "erreur tel";
                }
            } else {
                echo "erreur address";
            }
        } else {
            echo "erreur first name";
        }
    } else {
        echo "erreur last name";
    }
}