<?php 
class UserManager 
{
    public function getUserWithId($id): ?User
    {
        $user =
        Db::queryOne('
        SELECT `id`, `role_id`, `username`, `name`, `surname`, `email`, `password`, `birthdate`
        FROM User
        WHERE `id`=?' ,
        array($id));
        
        return new User (
            $user['id'],
            $user['role_id'],
            $user['username'],
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['password'],
            $user['birthdate'],
        );

        
    }


    

    public function register(int $role, string $username, string $name, string $surname, string $email, string $password, string $birthdate)
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

    }

    public function passwordIsGood ($password)
    {
        if (strlen($password)>6)
            return true;
        else
            return false;
        


    }

    

    
}