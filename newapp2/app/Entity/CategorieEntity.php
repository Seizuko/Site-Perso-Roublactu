<?php
namespace App\Entity;
use Core\Entity\Entity;

/**
* 
*/
class CategorieEntity extends Entity
{
	public function getUrl()
	{
		return '/forum/categorie-'.$this->id.'/';
	}

	public function getUrlCat()
	{
		return '/index.php?p=forum.editCat.editCat&idC='.$this->id;
	}

	public function getUrlSujet()
	{
		return '/forum/categorie-'.$this->categorie_sms_id.'/sujet-'.$this->sujet_id.'/';
	}

	public function getExtrait()
	{
		$message = $this->message;
		$replace = '<p>'.preg_replace("/<img[^>]+\>/i", "",$message).'</p>';
		$p = preg_replace("'<p[^>]*>'", "", $replace);
		$p2 = preg_replace("'</p>'", "", $p);
		$html = '<p>'.substr($p2, 0, 45).'...</p>';
		return $html;
	}
}