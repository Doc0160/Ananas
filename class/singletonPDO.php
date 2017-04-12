<?php

final class singletonPDO{
    private static $PDOInstance = null;
    private static $dsn         = null;
    private static $username    = null;
    private static $password    = null;
    private static $options     = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

    private function __construct(){
    }

    public static function getInstance(){
        if(is_null(self::$PDOInstance)){
            if(self::configDone()){
                self::$PDOInstance = new PDO(self::$dsn, self::$username, self::$password, self::$options);
            }else{
                throw new Exception(__CLASS__." : no config !");
            }
        }
        return self::$PDOInstance;
    }

    public static function setConfig($dsn, $username, $password, array $options = array()){
        self::$dsn      = $dsn;
        self::$username = $username;
        self::$password = $password;
        self::$options += $options;
    }

    private static function configDone(){
        return self::$dsn !== null && self::$username !== null && self::$password !== null;
    }
}

singletonPDO::setConfig('mysql:host=localhost;port=3306;dbname=ananas;charset=utf-8', 'root', '');

?>
