<?php

class SectionManager 
{
    public function getAllNameOrder ()
    {
        $sectionsQ = Db::queryAll('
            SELECT `id`, `section_id`, `user_id`, `name`, `desciption`
            FROM `section`
            ORDER BY `name` DESC'
         );
        
        $sections=[];

        foreach($sectionsQ as $section)
        {
            $sections[] = new Section(
            $section['id'],
            $section['section_id'],
            $section['user_id'],
            $section['name'],
            $section['desciption'],
            );
        }
        
        return $sections;
    }

    public function getAllFromSection ($section_id)
    {
        $sectionsQ = Db::queryAll('
            SELECT `id`, `section_id`, `user_id`, `name`, `desciption`
            FROM `section`
            WHERE `section_id` = ?
            ORDER BY `name` DESC'
            , array($section_id)
         );
        
        $sections=[];

        foreach($sectionsQ as $section)
        {
            $sections[] = new Section(
            $section['id'],
            $section['section_id'],
            $section['user_id'],
            $section['name'],
            $section['desciption'],
            );
        }
        
        return $sections;
    }

    public function getById($id): ?Section
    {
        
        $section=Db::queryOne('
        SELECT `id`, `section_id`, `user_id`, `name`, `desciption`
        FROM `section`
        WHERE `id` = ?
        ', array($id)
       
     );
    


        return new Section(
            $section['id'],
            $section['section_id'],
            $section['user_id'],
            $section['name'],
            $section['desciption'],
            );
    }

}