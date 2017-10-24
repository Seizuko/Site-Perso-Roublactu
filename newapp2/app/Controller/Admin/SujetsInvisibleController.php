<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;


class SujetsInvisibleController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Sujet');
    }

    public function sujetsInvisible()
    {
        if ($_POST) {
        if (!empty($_POST['id'] && $_POST['etat'])) {
        $result = $this->Sujet->update($_POST['id'],[
            'etat' => htmlspecialchars ($_POST['etat']),
        ]);
        if ($result) {
                        header('location: index.php?p=admin.sujetsInvisible.sujetsInvisible');
                        }
                    }
        }
        $post = $this->Post->lastRecent();
        $lastMessage = $this->Sujet->all();
        $this->render('admin.sujetsInvisible.sujetsInvisible', compact('post', 'utilisateurs', 'lastMessage'));
    }
}