<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\Controller\Controller;
use \App;

define('PREFIX_SALT', 'Roublard');
define('SUFFIX_SALT', 'Actualité');

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('User');
        $this->loadModel('Commentaire');

    }

    public function index()
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }else{
            $page = 1;
        }

        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['name'], $_POST['password'])){
                header('Location: /index.php');
            } else {
                $errors = true;
            }
        }

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
                header('location: /index.php');
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
        $lastPost = $this->Post->last();
        $pagination = $this->Post->pagination($page);
        $nbpage = array_pop($pagination);
        $post = $this->Post->lastRecent();
        $lastUser = $this->User->lastUser();
        $this->render('posts.index', compact('post', 'user', 'pseudo', 'resultat', 'errorsNameUse', 'errorsName', 'errorsMail', 'errorsMDP', 'errorsCaptcha', 'lastPost', 'lastUser', 'pagination', 'nbpage', 'errors'));
    }

    public function single()
    {
        if ($_POST) {
        if (!empty($_POST['commentaire'] && $_POST['articles_id'] && $_POST['auteurCommentaire'])) {
            $result = $this->Commentaire->create(
                ["commentaire"=>htmlspecialchars($_POST['commentaire']),
                "articles_id"=>htmlspecialchars($_POST['articles_id']),
                "users_id"=>htmlspecialchars($_POST['users_id']),
                "auteurCommentaire"=>htmlspecialchars($_POST['auteurCommentaire'])
                ]);
            }
        }
        $post = $this->Post->lastRecent();
        $single = $this->Post->find($_GET['idA']);
        $lastCom = $this->Commentaire->lastByCommentaire($_GET['idA']);
        $delCom = $this->Commentaire->all();
        $this->render('posts.single', compact('post', 'single', 'lastCom', 'delCom'));
    }

    public function editCom()
    {
        if ($_POST) {
        if (!empty($_POST['id'] && $_POST['commentaire'])) {
            $result = $this->Commentaire->update(
                $_POST['id'], 
                ["commentaire"=>$_POST['commentaire']
                ]);
            }
            if ($result) {
                header('location: index.php?p=posts.single&idA='.$_GET['idA']);
            }
        }
        $post = $this->Post->lastRecent();
        $com = $this->Commentaire->find($_GET['id']);
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $this->render('posts.editCom', compact('post', 'com', 'utilisateurs'));
    }

    public function deleteCom()
    {
        $result = $this->Commentaire->delete($_POST['id']);
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $this->render('posts.deleteCom', compact('utilisateurs'));
    }
}