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
            $userManager= new UserManager;
            if ($_POST["password"]===$_POST["password2"] && $userManager->passwordIsGood($_POST["password"]))
            {
            
            $password = $_POST["password"];
            $username = $_POST["userName"];
            
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $birthdate=$_POST["birthdate"];
            $birthdate= date('Y-m-d', strtotime($birthdate));;
            echo var_dump($_POST["birthdate"]);
            
            $userManager->register('2',$username, $name, $surname, $email, $password, $birthdate);
            echo '<script>alert("Uživatel registrován :)")</script>';
            //$this->redirect('treads');
            }
            else
            {
               $this->redirect('registration-form');
                echo "hesla nejsou stejná";
            }
        }
        else
        {
            $this->viewName = 'registrationForm'; 
        }
   }
}