<?php

//require_once(dirname(__FILE__) . '/../src/config/database.php');             
require_once(dirname(__FILE__) . '/../src/config/config.php');             
require_once(dirname(__FILE__) . '/../src/models/User.php');             

foreach(User::get([], 'name') as $user){
    echo $user->name;
    echo '<br>';
}

print_r(User::get(['name' => 'Chaves'], 'id, name, email'));
echo '<br>';
print_r(User::get());
