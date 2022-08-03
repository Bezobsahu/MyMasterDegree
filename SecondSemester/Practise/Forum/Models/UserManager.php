<?php 
class UserManager 
{
    public function getUserWithId($id)
    {
        return Db::queryOne('
            SELECT `Username`, `name`, `email`
            FROM User
            WHERE `id`=?' ,
            array($id)
    );
    }

    
}