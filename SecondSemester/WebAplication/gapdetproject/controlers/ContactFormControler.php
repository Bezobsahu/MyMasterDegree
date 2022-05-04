<?php

class ContactFormControler extends Controler
{
    public function process($parameters)
    {
        $this->headerN=array(
            'title' => 'kontaktní formulář',
            'keyWords' => 'kontakt, email, formulář',
            'description' => 'Pošli mi něco :D'

        );

        if (isset($_POST["email"]))
        {
            if($_POST["year"] == date("Y"))
            {
                $emailSender = new EmailSender();
                $emailSender->send("josefkorinek@bezobsahu.cz","Email z počítače",$_POST['message'],$_POST['email']);
            }
        }
        $this->viewName = 'contact';
    }
}