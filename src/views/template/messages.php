<?php

$errors = [];

if($exception) {                           //criando uma mensagem para exceção com html bootstrap
    $message = [
        'type' => 'error',
        'message' => $exception->getMessage()
    ];

    if(get_class($exception) === 'ValidationException'){
        $errors = $exception->getErrors();
    }
}

$alertType = '';
if($message['type'] === 'error'){               //se for um erro então o alert type será diferente no bootstrap
    $alertType = 'danger';
} else {
    $alertType = 'success';
}


?>

<?php if ($message): ?>                   <!-- se houver mensagem setada então... -->

    <div role = "alert" class="my-3 alert alert-<?=$alertType?>">
        <?= $message['message'] ?>
    </div>

<?php endif ?>