<?php

class SectionsControler extends Controler 
{
    public function process ($paramenters)
{
    $sectionManager = new SectionManager;
    $threadManager = new ThreadManager;
    $userManager = new UserManager;

    if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' && $_SESSION["login"]=== true )
        {
           if(isset($_POST["SectionName"]) && isset($_POST["SectionSub"])&& $userManager->getUserWithId($_SESSION["id"])->getRole_id() =="1")
           {           
            $sectionManager->add($paramenters[0], $_SESSION["id"],$_POST["SectionName"],$_POST["SectionDescription"]);
           }
           elseif(isset($_POST["SectionName"]) && isset($_POST["SectionSub"])&& $userManager->getUserWithId($_SESSION["id"])->getRole_id() =="2")
           {
            echo '<script>alert("Přidávat sekce mohou jen admini pošlete žádost jim")</script>';
           }
            elseif(isset($_POST["threadContent"]) && isset($_POST["threadName"]) && isset($_POST["threadSub"]))
            {
            $threadManager->add($_SESSION["id"],$_POST["threadContent"],$_POST["threadName"],$paramenters[0]);
            }
        }

    
    if (strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' && $_SESSION["login"]=== false)
    echo '<script>alert("Přidávat příspěvky mohou jen přihlášení uživatelé")</script>';
    if(!empty($paramenters[0]))
    {
        
        $section = $sectionManager->getById($paramenters[0]);
            if (!$section)
            {
                $this->redirect('error');
            }
       
        $sections = $sectionManager->getAllFromSection($paramenters[0]);

        
        $threads = $threadManager->getAllFromSection($section->getId());
        
       
            
        $this->data['threads'] = $threads;
        $this->data['section'] = $section->getName();
        $this->data['sections'] = $sections;
        $this->viewName = 'sections';
    }
    else
    {
        $sections = $sectionManager->getAllRootNameOrder();
        $threads=$threadManager->getEmpty();
        $this->data['section'] = "Hlavní sekce" ;
        $this->data['threads'] = $threads;
        $this->data['sections'] = $sections;
        $this->viewName = 'sections';
        $threads;
    }
}
}