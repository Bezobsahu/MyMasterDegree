<?php
abstract class Controler
{

    protected $data = array();
    protected $viewName = "";
    protected $headerN = array('title' => '', 'keyWords' => '', 'description' => '');

    abstract function process ($parameters);

    public function showView ()
    {
        if ($this->viewName)
        {
            extract($this->data);
            require("view/" . $this->viewName . ".php");
        }
    }


    public function redirect($url)
    {
    header("Location: /$url");
    header("Connection: close");
    exit;
    }




}

