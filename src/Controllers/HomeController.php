<?php

namespace src\Controllers;

use src\Services\Reponse;

class HomeController {
    
    use Reponse;




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
