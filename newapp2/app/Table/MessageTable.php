<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class MessageTable extends Table
{

	public function lastByMessage($category_id, $one=false)
	{
		return $this->query(" SELECT messages.id,
									 messages.message,
								 	 messages.auteur,
								 	 DATE_FORMAT(date_creation, 'Le %d/%m/%Y à %H:%i:%s') as date_creation_fr,
								 	 users.image,
								 	 users.signature,
								 	 users_id,
								 	 sujets.etat
								FROM messages
								LEFT JOIN sujets
									ON sujet_id = sujets.id
								LEFT JOIN users
									ON messages.users_id = users.id
								WHERE sujets.id = ?
								ORDER BY date_creation
							", [$category_id], $one);
	}

	public function nbMessageSujet($id)
	{
		return $this->query(" SELECT messages.id, messages.auteur, DATE_FORMAT(date_creation, 'Le %d/%m/%Y à %H:%i:%s') as date_creation_fr, count(sujet_id) as nbSujet FROM messages LEFT JOIN sujets ON sujet_id = sujets.id WHERE sujets.id = ? ORDER BY date_creation_fr DESC ", [$id]);
	}

	public function lastByMessageSujet($category_id, $one=false)
	{
		return $this->query(" SELECT messages.id,
									 messages.message,
								 	 messages.auteur,
								 	 DATE_FORMAT(date_creation, 'Le %d/%m/%Y à %H:%i:%s') as date_creation_fr
								FROM messages
								LEFT JOIN sujets
									ON sujet_id = sujets.id
								WHERE sujets.id = ?
								ORDER BY date_creation DESC LIMIT 0, 1
							", [$category_id], $one);
	}

	public function lastByMessageCat($category_id, $one=false)
	{
		return $this->query(" SELECT messages.id,
									 messages.message,
								 	 messages.auteur,
								 	 DATE_FORMAT(date_creation, 'Le %d/%m/%Y à %H:%i:%s') as date_creation_fr
								FROM messages
								LEFT JOIN categories
									ON categorie_sms_id = categories.id
								WHERE categories.id = ?
								ORDER BY date_creation DESC LIMIT 0, 1
							", [$category_id], $one);
	}

	public function countMessage($id)
	{
		return $this->query("SELECT count(users_id) AS nbSmsUser FROM messages WHERE users_id = ?", [$id]);
	}
}