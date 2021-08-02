<?php

//require_once(dirname(__FILE__) . '/../src/config/database.php');             
require_once(dirname(__FILE__) . '/../src/config/config.php');             
require_once(dirname(__FILE__) . '/../src/models/User.php');             

$user = new User(['name' => 'Lucas', 'email' => 'lucas@cod3r.com.br']);
echo $user->getSelect();