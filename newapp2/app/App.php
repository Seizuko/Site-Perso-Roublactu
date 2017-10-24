<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App{

    public $titre = 'Dofus Actualité - Roubl\'Actu';
    public $description = "Roubl'Actu est un site d'actualité Dofus, traitant de Dofus, Dofus-Touch, Dofus-Pets. Par des Fans, Pour des Fans !";
    public $image = "entete.png";
    public $Url = "http://roublactu.fr";

    private $db_instance;
    private static $_instance;

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    public function getTable($name){
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php');
        if(is_null($this->db_instance)){
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'),$config->get('db_char'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

}

class Titre{
    public $titre = 'Roubl\'Actu - L\'Actualité Dofus';
}