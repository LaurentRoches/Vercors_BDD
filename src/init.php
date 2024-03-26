<?php

use src\Models\Database;

require __DIR__ . "/../config.php";
require __DIR__ . "/autoload.php";

if(DB_INITIALIZED == FALSE){
  $db = new Database();

  $db->initializeDB();
}
