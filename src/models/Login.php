<?php
require_once(realpath(MODEL_PATH . '/User.php'));

class Login extends Model {

    public function checkLogin(){
        $user = User::getOne(['email' => $this->email]);
        if($user) {
            if(password_verify($this->password, $user->password)){ //verifica se a senha digitada pelo usuário bate com a senha criptografada pelo banco
                return $user;
            }    
        }
        throw new Exception();
    }
}