<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('User');
    }

    public function index(){
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $post = $this->Post->lastRecent();
        $this->render('admin.index', compact('utilisateurs', 'post'));
    }

    public function PostIndex()
    {
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $post = $this->Post->lastRecent();
        $posts = $this->Post->allAdd();
        $this->render('admin.posts.index', compact('utilisateurs', 'post', 'posts'));
    }

    public function add(){
        if ($_POST) {
        if (!empty($_POST['titre'] && $_POST['contenu'] && $_POST['auteur'] && $_POST['date_creation'] && $_FILES['img'])) {
            $title = str_replace('/', '-', $_POST['titre']);
            $articles = $this->Post->uploadImg(["titre" => $_POST['titre'],
                                                      "contenu" => $_POST['contenu'],
                                                      "img" => str_replace(' ','_', $title.".jpg"),
                                                      "auteur" => $_POST['auteur'],
                                                      "date_creation"=> $_POST['date_creation']],
                                                      $_FILES["img"]);
            chmod("/public_html/img/", 0777);
            chmod("/public_html/img/miniature/", 0777);
            $img2 = imagecreatefromjpeg("/public_html/img/".str_replace(' ','_',$title.".jpg"));
            $img3 = imagecreatefrompng("/public_html/img/".str_replace(' ','_',$title.".jpg"));
            imagejpeg($img2, "/public_html/img/".str_replace(' ','_',"miniature-".$title.".jpg"), 50);
            imagejpeg($img3, "/public_html/img/".str_replace(' ','_',"miniature-".$title.".jpg"), 50);
        }
            if ($articles) {
                ////message Flash
                header('location: /index.php');
            }
        }
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $post = $this->Post->lastRecent();
        $this->render('admin.posts.postsadd', compact('utilisateurs', 'post'));
    }

    public function single(){
        if ($_POST) {
        if (!empty($_POST['id'] && $_POST['titre'] && $_POST['contenu'])) {
            $result = $this->Post->update(
                $_POST['id'], 
                ["titre"=>$_POST['titre'], 
                "contenu"=>$_POST['contenu']
                ]);
            if ($result) {
                header('location: /index.php?p=posts.single&idA='.$_GET['idA']);
            }
        }
    }
        $post = $this->Post->lastRecent();
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $postArt = $this->Post->find($_GET['idA']);
        $this->render('admin.posts.postssingle', compact('post', 'postArt', 'utilisateurs'));
    }

    public function delete(){
        $utilisateurs = $this->User->find($_SESSION['Id']);
        if ($_POST) {
        if (!empty($_POST['id'])) {
            $result = $this->Post->delete($_POST['id']);
            if ($result) {
                header('location: /index.php?p=admin.posts.postIndex');
            }
        }
    }
    $this->render('admin.posts.postsdelete', compact('utilisateurs'));
    }

}