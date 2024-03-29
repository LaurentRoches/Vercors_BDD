<?php

use src\Models\User;
use src\Models\Database;
use src\Repositories\UserRepository;

$data = file_get_contents("php://input");
$user = (json_decode($data, true));
if(!empty($user)) {
    $obj = new User($user);
    $mail = $obj->getEmailUser();
    $password = $obj->getPasswordUser();
    if(validateData($mail, $password)){
        $DbConnexion = new Database();
        $UserRepository = new UserRepository($DbConnexion);
        if($UserRepository->login($mail, $password)){
            $_SESSION["connected"] = TRUE;
            $_SESSION["user"] = serialize($UserRepository->getThisUserByMail($mail));
        } else{
            $_SESSION["connected"] = FALSE;
        }
    }
}

function validateData($mail, $password){
    if(isset($mail) && !empty($mail)){
        $mail = htmlspecialchars($mail);
        if(isset($password) && !empty($password)){
            $password = hash("whirlpool", $password);
            return true;
        }
    }
}