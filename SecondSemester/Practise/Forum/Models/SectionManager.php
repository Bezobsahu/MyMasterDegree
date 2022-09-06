<?php

class SectionManager 
{
    public function getAllNameOrder ()
    {
        $selectionsQ = Db::queryAll('
            SELECT `id`, `selection_id`, `user_id`, `name`, `desciption`
            FROM `selection`
            ORDER BY `name` DESC'
         );
        
        $selections=[];

        foreach($selectionsQ as $selection)
        {
            $selections[] = new Section(
            $selection['id'],
            $selection['selection_id'],
            $selection['user_id'],
            $selection['name'],
            $selection['desciption'],
            );
        }
        
        return $selections;
    }

    public function getById($id): ?Section
    {
        $selection=Db::queryAll('
        SELECT `id`, `selection_id`, `user_id`, `name`, `description`
        FROM `selection`
        WHERE `id` = ?
        ', array($id)

     );


        return new Selection(
            $selection['id'],
            $selection['selection_id'],
            $selection['user_id'],
            $selection['name'],
            $selection['description'],
            );
    }

}