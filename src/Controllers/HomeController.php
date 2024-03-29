<?php

namespace src\Controllers;

use src\Models\Database;
use src\Models\User;
use src\Repositories\UserRepository;
use src\Services\Reponse;

class HomeController {

      use Reponse;
/**
 * quand le routeur appel l'index,
 *
 * @return  void    la Views \login.php
 */
      public function index() :void {
            // On définit la variable erreur, soit avec le message en GET, soit vide
            $erreur = isset($_GET["erreur"]) ? $_GET["erreur"] : '';
            // grace à la methode render du Services\Reponse
            //on appel la view = login avec une section "erreur" contenant la variable $erreur
            $this->render("login", ["erreur" => $erreur]);
      }

      public function login(){
            $data = file_get_contents("php://input");
            $user = (json_decode($data, true));
            if(!empty($user)) {
                  $obj = new User($user);
                  $mail = $obj->getEmailUser();
                  if(isset($mail) && !empty($mail)){
                        $mail = htmlspecialchars($mail);
                  }
                  $password = $obj->getPasswordUser();
                  if(isset($password) && !empty($password)){
                        $password = hash("whirlpool", $password);
                  }
                  $DbConnexion = new Database();
                  $UserRepository = new UserRepository($DbConnexion);
                  if($UserRepository->login($mail, $password)){
                        $_SESSION["connected"] = TRUE;
                        $_SESSION["user"] = serialize($UserRepository->getThisUserByMail($mail));
                        echo HOME_URL . 'dashboard';
                        die();
                  } else{
                        header('location: '.HOME_URL.'?erreur=connexion');
                        die();
                  }
            }
      }

      public function pageRegister() :void {
            // On définit la variable erreur, soit avec le message en GET, soit vide
            $erreur = isset($_GET["erreur"]) ? $_GET["erreur"] : '';
            // grace à la methode render du Services\Reponse
            //on appel la view = login avec une section "erreur" contenant la variable $erreur
            $this->render("register", ["erreur" => $erreur]);
      }

      public function pageDashboard() :void {
            // On définit la variable erreur, soit avec le message en GET, soit vide
            $erreur = isset($_GET["erreur"]) ? $_GET["erreur"] : '';
            $user = unserialize($_SESSION['user']);
            // grace à la methode render du Services\Reponse
            //on appel la view = login avec une section "erreur" contenant la variable $erreur
            $this->render("dashboard", ["erreur" => $erreur, "user" => $user]);
      }

      public function quit() {

            session_destroy();
            header('location: '.HOME_URL);
            die();

      }

      public function page404(): void { 

            header("HTTP/1.1 404 Not Found");
            $this->render('404');

      }
}
