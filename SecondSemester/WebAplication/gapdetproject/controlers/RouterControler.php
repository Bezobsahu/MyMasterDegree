<?php
class RouterControler extends Controler
{

    protected $controler;

    public function process($parameters)
    {
        $parsedURL = $this->parseURL($parameters[0]);

        if (empty($parsedURL[0]))
            $this->redirect('clanek/uvod');
            
        $controlerClass = $this->dashesToCamelsNotation(array_shift($parsedURL)) .'Controler';
        
        if (file_exists('controlers/' . $controlerClass . '.php'))
            $this->controler = new $controlerClass;
        else
            $this->redirect('error');
        
        $this->controler->process($parsedURL);

        $this->data['title'] = $this->controler->headerN['title'];
        $this->data['description'] = $this->controler->headerN['description'];
        $this->data['keyWords'] = $this->controler->headerN['keyWords'];

        $this->viewName='layout';
      
        
       

    }

    private function parseURL($url)
    {
        $parsedURL = parse_url($url);
        $parsedURL["path"] = ltrim($parsedURL["path"],"/");
        $parsedURL["path"] = trim($parsedURL["path"]);

        $dividedPath = explode("/",$parsedURL["path"]);

        return $dividedPath;
    }

    private function dashesToCamelsNotation ($text)
    {
        $sentence = str_replace('-', ' ', $text);
        $sentence = ucwords($sentence);
        $sentence = str_replace(' ','',$sentence);
        return $sentence;

    }


}
    