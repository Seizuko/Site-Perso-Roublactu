<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

define('PREFIX_SALT', 'Roublard');
define('SUFFIX_SALT', 'Actualité');


class UsersController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('User');
        $this->loadModel('Message');
    }

    public function login(){
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['name'], $_POST['password'])){
                header('Location: /index.php');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $post = $this->Post->lastRecent();
        $this->render('users.login', compact('form', 'post', 'errors'));
    }

    public function disconnect()
    {
        $this->render('users.disconnect', compact('form', 'errors'));
        session_destroy();
        header("Location: /index.php");
        exit();
    }

    public function profil()
    {
        if (!empty($_POST['mail'])) {
        $result = $this->User->update($_SESSION['Id'],[
            'mail' => htmlspecialchars ($_POST['mail']),
        ]); 
        if ($result) {
                        header('location: index.php?p=users.profil');
                        }
        }

        if (!empty($_POST['image'])) {
        $result = $this->User->update($_SESSION['Id'],[
            'image' => htmlspecialchars($_POST['image']),
        ]);
        if ($result) {
                        header('location: index.php?p=users.profil');
                        }
        }

        if (!empty($_POST['password'])) {
        $result = $this->User->update($_SESSION['Id'], ['password' => sha1(htmlspecialchars($_POST['password']))]);
        if ($result) {
            header('location: index.php?p=users.profil');
                        }
        }

        if (!empty($_POST['signature'])) {
        $result = $this->User->update($_SESSION['Id'],[
            'signature' => $_POST['signature'],
        ]); 
        if ($result) {
                        header('location: index.php?p=users.profil');
                        }
        }
        $countMessage = $this->Message->countMessage($_SESSION['Id']);
        $post = $this->Post->lastRecent();
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $this->render('users.profil', compact('post', 'utilisateurs', 'countMessage'));
    }

    public function register(){
        $pseudo = $this->User->pseudo();
        $resultat = 0;
        $errorsNameUse = false;
        $errorsName = false;
        $errorsMail = false;
        $errorsMDP = false;
        $errorsCaptcha = fasle;

            // Ma clé privée
            $secret = "6LebSCgUAAAAAODO0RtP20vVmyw0x_VJ3uBJ7L6g";
            // Paramètre renvoyé par le recaptcha
            $response = $_POST['g-recaptcha-response'];
            // On récupère l'IP de l'utilisateur
            $remoteip = $_SERVER['REMOTE_ADDR'];

            $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
            . $secret
            . "&response=" . $response
            . "&remoteip=" . $remoteip ;

            $decode = json_decode(file_get_contents($api_url), true);


        if ($decode['success'] == true) {
        if (!empty($_POST)) {
            foreach($pseudo as $alias){
                        if(strtolower($alias->name) === strtolower($_POST['name'])){
                             $resultat ++;
                        }else{

                        }
                    }if($resultat >= 1){
                        $errorsNameUse = true;
                    }else{
                        $errorsNameUse = false;
            if (isset($_POST['name'], $_POST['password'], $_POST['password_confirm'], $_POST['date_de_naissance'], $_POST['mail'], $_POST['date_inscription'])){
            if(empty($_POST['name']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['name'])){
                    $errorsName = true; //Echo pour pseudo non valide
                }else{
            if(empty($_POST['password']) || $_POST['password']!=$_POST['password_confirm']){
                    $errorsMDP = true; //Echo pour mot de passe non valide
                }else{
            if(empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                   $errorsMail = true; //Echo pour mail non valide
                }else{
            $result = $this->User->create([
                'name' => htmlspecialchars($_POST['name']),
                'password' => sha1((htmlspecialchars(PREFIX_SALT.$_POST['password'].SUFFIX_SALT))),
                'mail' => htmlspecialchars($_POST['mail']),
                'date_inscription' => htmlspecialchars($_POST['date_inscription']),
                'date_de_naissance' => htmlspecialchars($_POST['date_de_naissance'])]);
            if($result){
                header('location: index.php?p=users.login');
                    }
                }
                }
                }
            }
            }
            }
        }else{
            $errorsCaptcha = true;
        }
    $post = $this->Post->lastRecent();
    $this->loadModel('User');
    $this->render('users.register', compact('user', 'post','pseudo','resultat','errorsNameUse','errorsName','errorsMail','errorsMDP','errorsCaptcha'));
    }

}