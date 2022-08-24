<?php

class UserControler extends Controler
{
    public function process ($parameters)
    {
       
        $userManager = new UserManager;
        
        $user = $userManager->getUserWithId($parameters[0]);

        $this->data['user']=$user;

        $this->viewName='user';
    }
}