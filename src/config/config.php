<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt-BR', 'pt-BR.utf-8', 'portuguese');

// Pastas (constantes para facilitar)
define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));

require_once(realpath(dirname(__FILE__) . '/database.php'));