<?php
abstract class Controler
{
    
    protected $data = array('login' => false);
    protected $viewName = "";
    protected $headerN = array('title' => '', 'keyWords' => '', 'description' => '');
    
    public function __construct() {
        $this->data['login']=$_SESSION['login'];
    }

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




	
	/**
	 * @return bool
	 */
	function getLogin(): bool {
		return $this->login;
	}
}

