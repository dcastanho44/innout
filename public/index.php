<?php

require_once(dirname(__FILE__) . '/../src/config/database.php');             

Database::getConnection();

$sql = 'SELECT * FROM users';
$result = Database::getResultFromQuery($sql);

while ($row = $result->fetch_assoc()){
    print_r($row);
    echo '<br>';
}
