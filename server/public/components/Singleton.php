<?php

namespace components;

class Singleton
{
    private static $instances = [];
    public $pdo;

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    public static function getInstance()
    {
        $subclass = static::class;

        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }

        return self::$instances[$subclass];
    }
    public  function connectBD()
    {

        $DBUser = 'root';
        $DBHost = 'a_level_nix_mysql:3306';
        $DBPwd = 'cbece_gead-cebfa';
        $DBName = 'a_level_nix_mysql';

        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];

        try {
            $dns = "mysql:host=$DBHost;dbname=$DBName;";
            $this -> pdo = new \PDO($dns, $DBUser, $DBPwd, $options);
            echo "Base connected<br>";
            return $this -> pdo;

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }


}
