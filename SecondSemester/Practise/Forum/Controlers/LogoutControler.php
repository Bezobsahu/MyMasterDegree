<?php

class LogoutControler extends Controler
{
    public function process($parameters)
    {
        $usercontroler= new UserManager;
        $usercontroler->logout();
        $this->redirect('LoginForm');
    }
}