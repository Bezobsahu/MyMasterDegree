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

    public function register(int $role,string $username,string $name, string $surname, string $email, string $password,  $birthdate)
    {
        $user=array("username"=>$username, 
                    "name"=>$name,
                    "surname"=>$surname,
                    "email"=>$email,
                    "birthdate"=> $birthdate,
                    "password"=>password_hash($password, PASSWORD_BCRYPT), 
                    "role_id"=>$role);
        Db::queryOne('
            INSERT INTO user(`username`, `name`, `surname`, `email`, `birthdate`, `password`, `role_id`)
            VALUES          (:username, :name, :surname, :email, :birthdate, :password, :role_id)
        ',$user);
        echo (var_dump($birthdate));
    

    }

    public function passwordIsGood ($password)
    {
        if (strlen($password)>6)
            return true;
        else
            return false;
        


    }

    

    
}