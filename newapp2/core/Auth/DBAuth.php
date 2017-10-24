<?php
namespace Core\Auth;

use Core\Database\Database;

class DBAuth {

    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function getUserId(){
        if($this->logged()){
            return $_SESSION['Auth'];
        }
        return false;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password){
        $user = $this->db->prepare('SELECT * FROM users WHERE name = ?', [$username], null, true);
        if($user){
            if($user->password === sha1(PREFIX_SALT.$password.SUFFIX_SALT)){
                $_SESSION['Auth'] = $user->name;
                $_SESSION['Id'] = $user->id;
                return true;
            }
        }
        $admin = $this->db->prepare('SELECT * FROM users WHERE name = ?', [$username], null, true);
        if($admin){
            if($admin->password === sha1(PREFIX_SALT.$password.SUFFIX_SALT)){
                $_SESSION['Admin'] = $admin->name;
                $_SESSION['Id'] = $admin->id;
                return true;
            }
        }
        $moderateur = $this->db->prepare('SELECT * FROM users WHERE name = ?', [$username], null, true);
        if($moderateur){
            if($moderateur->password === sha1(PREFIX_SALT.$password.SUFFIX_SALT)){
                $_SESSION['Moderateur'] = $moderateur->name;
                $_SESSION['Id'] = $moderateur->id;
                return true;
            }
        }
        $redacteur = $this->db->prepare('SELECT * FROM users WHERE name = ?', [$username], null, true);
        if($redacteur){
            if($redacteur->password === sha1(PREFIX_SALT.$password.SUFFIX_SALT)){
                $_SESSION['Redacteur'] = $redacteur->name;
                $_SESSION['Id'] = $redacteur->id;
                return true;
            }
        }
        return false;
    }

    public function logged(){
        return isset($_SESSION['Auth']);
    }

}