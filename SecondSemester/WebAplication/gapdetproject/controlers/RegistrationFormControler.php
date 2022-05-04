<?php
class RegistrationFormControler extends Controler
{

        
    public function process($parameters)
    {
        $this->headerN=array(
            'title' => 'registrační formulář',
            'keyWords' => 'kontakt, email, formulář',
            'description' => 'Registruj se na této stránce :D'

        );

        if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST')
        {
            require 'model/comands/config.php';
            $registrationManager = new RegistrationManager;
            $registrationManager->registerUser($host, $user, $password, $dbname);
            echo '<script>alert("Uživatel registrován :)")</script>';
            $this->redirect('Login');
            
        }
        else
        {
            $this->viewName = 'blocks/registrationForm'; 
        }
   }
}