<?php
class LoginFormControler extends Controler
{

        
    public function process($parameters)
    {
        $this->headerN=array(
            'title' => 'Login',
            'keyWords' => 'login, přihlášení, vstup',
            'description' => 'Přihlašte se vyplněním pole níže'

        );

        if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST')
        {
            require 'model/comands/config.php';
            $registrationManager = new RegistrationManager;
            $registrationManager->registerUser($host, $user, $password, $dbname);
            echo '<script>alert("Uživatel registrován :)")</script>';
            
        }
        else
        {
            $this->viewName = 'blocks/loginForm'; 
        }
   }
}