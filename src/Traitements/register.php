<?php

use src\Models\Database;
use src\Models\User;
use src\Repositories\UserRepository;



$data = file_get_contents("php://input");
$userTableau = (json_decode($data, true));

if (!empty($userTableau)) {
    echo "on est dans la condition";
    $userObjet = new User($userTableau);

    $lastName = $userObjet->getLastNameUser();
    $firstName = $userObjet->getFirstNameUser();
    $address = $userObjet->getAddressUser();
    $tel = $userObjet->getTelUser();
    $email = $userObjet->getEmailUser();
    $password = $userObjet->getPasswordUser();
    $rgpd = $userObjet->getRgpdUser();


    if (validateData($lastName, $firstName, $address, $tel, $email, $password, $rgpd)) {
        echo "on a verifier la secu";
        $dbConnexion = new Database();
        $UserRepository = new UserRepository();

        if ($UserRepository->getThisUserByMail($email)) {
            echo "Email already taken";
            die;
        } else {
            if ($UserRepository->createUser($userObjet)) {
                echo "succes";
                die;
            } else {
                echo "erreur enregistrement";
                die;
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
                                return true;
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