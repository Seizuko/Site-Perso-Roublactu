<?php
namespace App\Entity;
use Core\Entity\Entity;

/**
* 
*/
class MessageEntity extends Entity
{

	public function getUrl()
	{
		return '/index.php?p=forum.editMessage.editMessage&idC='.$_GET['idC'].'&idS='.$_GET['idS'].'&idM='.$this->id;
	}

}