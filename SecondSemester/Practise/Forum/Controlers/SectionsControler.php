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
        
        $threadManager = new ThreadManager;
        $threadManager->getAllFromSection($section->getId());
         
    }
    else
    {
        $sections = $sectionManager->getAllNameOrder();
        $this->data['sections'] = $sections;
        $this->viewName = 'sections';
    }
}
}