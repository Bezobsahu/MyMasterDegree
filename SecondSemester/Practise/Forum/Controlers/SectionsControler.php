<?php

class SectionsControler extends Controler 
{
    public function process ($paramenters)
{
    $sectionManager = new SectionManager;
    $threadManager = new ThreadManager;
   
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
        $this->data['sections'] = $sections;
        $this->viewName = 'sections';
    }
    else
    {
        $sections = $sectionManager->getAllRootNameOrder();
        $threads=$threadManager->getEmpty();
        $this->data['threads'] = $threads;
        $this->data['sections'] = $sections;
        $this->viewName = 'sections';
        $threads;
    }
}
}