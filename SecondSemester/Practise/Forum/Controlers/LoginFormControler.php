<?php

class LoginFormControler extends Controler 
{
    public function process($parameters)
    {
        $this->headerN=array(
            'title' => 'přihlašovací formulář',
            'keyWords' => 'kontakt, email, formulář',
            'description' => 'Přihlaš se na této stránce :D'
        );

        if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST')
        {
            $userManager= new UserManager;
            $userManager->login($_POST["userName"],$_POST["password"]);

            $this->redirect('threads');;
        }
        else
        {
            $this->viewName = 'LoginForm'; 
        }
    }

}