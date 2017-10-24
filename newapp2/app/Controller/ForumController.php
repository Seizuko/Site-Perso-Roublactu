<?php
namespace App\Controller;

use Core\Controller\Controller;

class ForumController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('User');
        $this->loadModel('Message');
        $this->loadModel('Categorie');
        $this->loadModel('Sujet');
        $this->loadModel('Titre_Categorie');

    }

    public function categorie()
    {
        $lastMessage = $this->Categorie->lastMessage();
        $post = $this->Post->lastRecent();
        $nbUser = $this->User->nombreUser();
        $nbSms = $this->Message->all();
        $titre_categorie = $this->Titre_Categorie->all();
        $this->render('forum.categorie', compact('post', 'nbUser', 'nbSms', 'utilisateurs', 'titre_categorie', 'lastMessage'));
    }

    public function sujet()
    {
        if ($_POST) {
        if (!empty($_POST['id'] && $_POST['etat'])) {
        $result = $this->Sujet->update($_POST['id'],[
            'etat' => htmlspecialchars ($_POST['etat']),
        ]);
        if ($result) {
                        header('location: index.php?p=forum.sujet&idC='.$_GET['idC']);
                        }
                    }
        }
        $lastMessage = $this->Categorie->lastMessage();
        $post = $this->Post->lastRecent();
        $nbUser = $this->User->nombreUser();
        $nbSms = $this->Message->all();
        $lastSujet = $this->Sujet->lastBySujet($_GET['idC']);
        $utilisateurs = $this->User->all();
        $titre = $this->Categorie->find($_GET['idC']);
        $this->render('forum.sujet', compact('post', 'nbUser', 'nbSms', 'utilisateurs', 'lastSujet', 'titre', 'lastMessage'));
    }

    public function message()
    {
        if ($_POST) {
        if (!empty($_POST['categorie_sms_id'] && $_POST['sujet_id'] && $_POST['auteur'] && $_POST['message'] && $_POST['date_creation'] && $_POST['users_id'])) {
            $result = $this->Message->create(
                [
                "categorie_sms_id"=>htmlspecialchars($_POST['categorie_sms_id']),
                "sujet_id"=>htmlspecialchars($_POST['sujet_id']),
                "date_creation"=>htmlspecialchars($_POST['date_creation']),
                "auteur"=>htmlspecialchars($_POST['auteur']),
                "message"=>$_POST['message'],
                "users_id"=>htmlspecialchars($_POST['users_id'])
                ]);
            if ($result) {
                ////message Flash
                header('location: /forum/categorie-'.$_GET['idC'].'/sujet-'.$_GET['idS'].'/');
            }
        }
    }
        $lastMessage = $this->Categorie->lastMessage();
        $post = $this->Post->lastRecent();
        $titre = $this->Sujet->find($_GET['idS']);
        $lastByMessage = $this->Message->lastByMessage($_GET['idS']);
        $utilisateurs = $this->User->all();
        $this->render('forum.message', compact('post', 'utilisateurs', 'titre', 'lastByMessage', 'lastMessage'));
    }

    public function createCat()
    {
        if ($_POST) {
        if (!empty($_POST['titre'])) {
            $result = $this->Titre_Categorie->create(
                ["titre"=>htmlspecialchars($_POST['titre'])
                ]);
            if ($result) {
                ////message Flash
                header('location: /forum/');
            }
        }
    }
        $post = $this->Post->lastRecent();
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $catAdd = $this->Titre_Categorie->all();
        $this->render('forum.add.categorieAdd', compact('post', 'utilisateurs', 'catAdd'));
    }

    public function createsousCat()
    {
        if ($_POST) {
        if (!empty($_POST['titre'] && $_POST['description'] && $_POST['titre_cat_id'])) {
            $result = $this->Categorie->create(
                ["titre"=>htmlspecialchars($_POST['titre']),
                "description"=>htmlspecialchars($_POST['description']),
                "titre_cat_id"=>htmlspecialchars($_POST['titre_cat_id'])
                ]);
            if ($result) {
                ////message Flash
                header('location: /forum/');
            }
        }
    }
        $post = $this->Post->lastRecent();
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $catAdd = $this->Titre_Categorie->all();
        $this->render('forum.add.souscategorieAdd', compact('post', 'utilisateurs', 'catAdd'));
    }

    public function createSujet()
    {
        if ($_POST) {
        if (!empty($_POST['titre'] && $_POST['auteur'] && $_POST['categorie_id'])) {
            $result = $this->Sujet->create(
                [
                "titre"=>htmlspecialchars($_POST['titre']),
                "auteur"=>htmlspecialchars($_POST['auteur']),
                "categorie_id"=>htmlspecialchars($_POST['categorie_id'])
                ]);
        if (!empty($_POST['categorie_sms_id'] && $_POST['sujet_id'] && $_POST['auteur'] && $_POST['message'] && $_POST['date_creation'] && $_POST['users_id'])) {
            $result = $this->Message->create(
                [
                "categorie_sms_id"=>htmlspecialchars($_POST['categorie_sms_id']),
                "sujet_id"=>htmlspecialchars($_POST['sujet_id']),
                "date_creation"=>htmlspecialchars($_POST['date_creation']),
                "auteur"=>htmlspecialchars($_POST['auteur']),
                "message"=>$_POST['message'],
                "users_id"=>htmlspecialchars($_POST['users_id'])
                ]);
            if ($result) {
                ////message Flash
                header('location: forum/categoeir-'.$_GET['idC'].'/sujet-'.$_POST['sujet_id'].'/');
                }
            }
        }
    }
        $lastId = $this->Sujet->lastInsertId();
        $post = $this->Post->lastRecent();
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $this->render('forum.add.sujetAdd', compact('post', 'utilisateurs', 'lastId'));
    }

    public function delSujet()
    {
        $post = $this->Post->lastRecent();
        $result = $this->Sujet->delete($_POST['id']);
        if ($result) {
                ////message Flash
                header('location: index.php?p=forum.sujet&idC='.$_GET['idC']);
            }
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $this->render('forum.del.sujetDel', compact('post', 'utilisateurs'));
    }

    public function delMessage()
    {
        $post = $this->Post->lastRecent();
        $result = $this->Message->delete($_POST['id']);
        if ($result) {
                ////message Flash
                header('location: index.php?p=forum.message&idC='.$_GET['idC'].'&idS='.$_GET['idS']);
            }
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $this->render('forum.del.messageDel', compact('post', 'utilisateurs'));
    }

    public function editCat(){
        if ($_POST) {
        if (!empty($_POST['description'])) {
            $result = $this->Categorie->update(
                $_POST['id'],
                ["titre"=>$_POST['titre'],
                "description"=>$_POST['description']
                ]);
            if ($result) {
                header('location: /forum/');
            }
        }
    }
        $post = $this->Post->lastRecent();
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $editCat = $this->Categorie->find($_GET['idC']);
        $this->render('forum.edit.editCat', compact('post', 'utilisateurs', 'editCat'));
    }

    public function editSujet(){
        if ($_POST) {
        if (!empty($_POST['titre'])) {
            $result = $this->Sujet->update(
                $_POST['id'],
                ["titre"=>$_POST['titre']
                ]);
            if ($result) {
                header('location: /forum/categoeir-'.$_GET['idC'].'/');
            }
        }
    }
        $post = $this->Post->lastRecent();
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $editSujet = $this->Sujet->find($_GET['idS']);
        $this->render('forum.edit.editSujet', compact('post', 'utilisateurs', 'editSujet'));
    }

    public function editMessage(){
        if ($_POST) {
        if (!empty($_POST['message'])) {
            $result = $this->Message->update(
                $_POST['id'],
                ["message"=>$_POST['message']
                ]);
            if ($result) {
                header('location: forum/categorie-'.$_GET['idC'].'/sujet-'.$_GET['idS'].'/');
            }
        }
    }
        $post = $this->Post->lastRecent();
        $utilisateurs = $this->User->find($_SESSION['Id']);
        $editMessage = $this->Message->find($_GET['idM']);
        $this->render('forum.edit.editMessage', compact('post', 'utilisateurs', 'editMessage'));
    }


}