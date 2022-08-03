<?php
class ErrorControler extends Controler
{
    public function process ($parameters)
    {
        header("HTTP/1.0 404 Not Found");
        $this->headerN['title']='chybička 404';
        $this->viewName='error';
    }
}