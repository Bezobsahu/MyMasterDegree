<?php
class Db {
    public static $conection;
    
    private static $setting = array ( 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );
            
    public static function connect($host, $user, $password, $dbname ){
        if (!isset(self::$conection)){
            self::$conection = @new PDO(
                "mysql:host=$host;dbname=$dbname",
                $user,
                $password,
                self::$setting
            );
        }


    }

    public static function queryOne ($query, $parameters = array())
    {
        $returned = self::$conection->prepare($query);
        $returned -> execute($parameters);
        return $returned->fetch(); 
    }

    public static function queryAll ($query, $parameters = array())
    {
        $returned = self::$conection->prepare($query);
        $returned -> execute($parameters);
        return $returned->fetchAll(); 
    }

    public static function queryAlone ($query, $parameters = array())
    {
        $result = self::queryOne ($query, $parameters);
        return $result[0];

    }

    public static function querry ($query, $parameters = array())
    {
        $returned = self::$conection->prepare ($query);
        $returned->execute($parameters);
        return $returned->rowCount();
    }
}

