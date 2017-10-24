<?php
namespace App\Entity;
use Core\Entity\Entity;

/**
* 
*/
class SujetEntity extends Entity
{
	public function getUrl()
	{
		return '/forum/categorie-'.$_GET['idC'].'/sujet-'.$this->id.'/';
	}


	public function getUrlEdit()
	{
		return '/index.php?p=forum.editSujet.editSujet&idC='.$_GET['idC'].'&idS='.$this->id;
	}

}