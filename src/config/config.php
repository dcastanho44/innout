<?php

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt-BR', 'pt-BR.utf-8', 'portuguese');

// Pastas (constantes para facilitar)
define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__) . '/../views/template'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__) . '/../exceptions'));

//Arquivos
require_once(realpath(dirname(__FILE__) . '/database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(MODEL_PATH . '/model.php'));
require_once(realpath(EXCEPTION_PATH . '/AppException.php'));