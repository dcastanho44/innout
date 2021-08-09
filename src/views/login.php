<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/comum.css">
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/icofont.min.css">
    <title>In And Out</title>
</head>
<body>
    <form class="form-login" action="#" method="post">
        <div class="login-card card">
            <div class="card-header">        <!-- header do bootstrap card -->
                <i class="icofont-travelling mr-2"></i>
                <span class="font-weight-light">In</span>
                <span class="font-weight-light mr-2 ml-2">And</span>
                <span class="font-weight-light">Out</span>
                <i class="icofont-runner-alt-1 ml-2"></i>
            </div>
            <?php include(TEMPLATE_PATH . 'messages.php') ?>
            <div class="card-body">          <!-- body do bootstrap card -->
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email"
                        class="form-control 
                        <?= isset($exception) ? ($exception->get('email') ? 'is-invalid' : '') : '' ?>" value="<?= $_POST['email'] ?>" placeholder="Informe o e-mail" autofocus>
                    <div class="invalid-feedback">
                        <?php echo (isset($exception) ? ($exception->get('email')) : '') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password"
                        class="form-control 
                        <?= isset($exception) ? ($exception->get('password') ? 'is-invalid' : '') : '' ?>" placeholder="Informe a senha" autofocus>
                    <div class="invalid-feedback">
                        <?php echo (isset($exception) ? ($exception->get('password')) : '') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">           <!-- rodapé do bootstrap card -->
            <button class="btn btn-lg btn-primary">Entrar</button>
        </div>
    </form>
    <?= $texto ?>
</body>
</html>