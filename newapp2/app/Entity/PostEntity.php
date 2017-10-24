<?php
namespace App\Entity;

use Core\Entity\Entity;
/**
* 
*/
class PostEntity extends Entity
{
	public function getUrl()
	{
		return '/article/'.$this->id.'/';
	}
	public function getExtrait()
	{
		$html = '<p>'.substr($this->contenu, 0, 50).'...</p>';
		$html .= '<p><a href="'.$this->getUrl().'">Voir la suite</a></p>';
		return $html;
	}
}
