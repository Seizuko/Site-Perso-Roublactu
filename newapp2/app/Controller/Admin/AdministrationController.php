<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;


class AdministrationController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('User');
        $this->loadModel('Image');
    }

    public function index(){
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $post = $this->Post->lastRecent();
        $this->render('admin.administration.index', compact('utilisateurs', 'post'));
    }
}