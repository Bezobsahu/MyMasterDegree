<?php

class SectionManager 
{
    public function getAllRootNameOrder ()
    {
        $sectionsQ = Db::queryAll('
            SELECT `id`, `section_id`, `user_id`, `name`, `description`
            FROM `section`
            WHERE `section_id` IS NULL
            ORDER BY `name` DESC
            '
         );
        
        $sections=[];

        foreach($sectionsQ as $section)
        {
            $sections[] = new Section(
            $section['id'],
            $section['section_id'],
            $section['user_id'],
            $section['name'],
            $section['description'],
            );
        }
        
        return $sections;
    }

    public function getAllFromSection ($section_id)
    {
        $sectionsQ = Db::queryAll('
            SELECT `id`, `section_id`, `user_id`, `name`, `description`
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
            $section['description'],
            );
        }
        
        return $sections;
    }

    public function getById($id): ?Section
    {
        
        $section=Db::queryOne('
        SELECT `id`, `section_id`, `user_id`, `name`, `description`
        FROM `section`
        WHERE `id` = ?
        ', array($id)
       
     );
    


        return new Section(
            $section['id'],
            $section['section_id'],
            $section['user_id'],
            $section['name'],
            $section['description'],
            );
    }

    public function add($section_id, int $user_id, string $name, string $description)
    {
        $section=array("section_id"=> $section_id,
                        "user_id"=>$user_id,
                        "name"=>$name,
                        "description"=>$description);

        Db::queryOne('
            INSERT INTO section(`section_id`,`user_id`, `name`, `description`)
            VALUES          (:section_id, :user_id,  :name, :description)
        ',$section); 
    }

}