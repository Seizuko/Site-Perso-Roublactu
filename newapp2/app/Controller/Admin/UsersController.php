<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;


class UsersController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('User');
        $this->loadModel('Image');
    }

   public function index(){
        if ($_POST) {
        if (!empty($_POST['id'] && $_POST['membre_rang'])) {
        $result = $this->User->update($_POST['id'],[
            'membre_rang' => htmlspecialchars ($_POST['membre_rang']),
        ]);
        if ($result) {
                        header('location: /index.php?p=admin.users.index');
                        }
                    }
        }
        $user = $this->User->all();
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $post = $this->Post->lastRecent();
        $this->render('admin.users.index', compact('user', 'utilisateurs', 'post'));
    }

    public function modif()
    {
        $user = $this->User->all();
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $post = $this->Post->lastRecent();
        $this->render('admin.users.modif', compact('user', 'utilisateurs', 'post'));
    }

    public function delete(){
        $utilisateurs = $this->User->find($_SESSION['Id']);
        if ($_POST) {
        if (!empty($_POST['id'])) {
            $result = $this->User->delete($_POST['id']);
            if ($result) {
                header('location: /index.php?p=admin.users.index');
            }
        }
    }
    $this->render('admin.users.delete', compact('utilisateurs'));
    }

    public function image()
    {
        if ($_POST) {
        if (!empty($_POST['titre'] && $_FILES['images'])) {
            $images = $this->Image->uploadImage(["titre" => $_POST['titre'],
                "images"=>$_FILES['images']['name']],
                $_FILES["images"]);
            if ($images) {
                ////message Flash
                header('location: /index.php?p=admin.users.image');
            }
        }
    }
    $post = $this->Post->lastRecent();
    $utilisateurs = $this->User->find($_SESSION['Id']);
    $this->render('admin.users.image', compact('post', 'utilisateurs'));
    }
}