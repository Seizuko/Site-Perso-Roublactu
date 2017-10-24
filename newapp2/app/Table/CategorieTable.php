<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class CategorieTable extends Table
{
	public function Cat($id)
	{
		return $this->query("SELECT categories.id, categories.titre, categories.description FROM categories LEFT JOIN titre_categories ON categories.titre_cat_id = titre_categories.id WHERE titre_categories.id = ?", [$id]);
	}

	public function nbSmsCat($id)
	{
		return $this->query(" SELECT categories.id, count(categorie_sms_id) as nbSmsCat FROM categories LEFT JOIN messages ON categorie_sms_id = categories.id WHERE categories.id = ?", [$id]);
	}

	public function lastMessage()
	{
		return $this->query(" SELECT messages.id,
									 messages.message,
								 	 messages.auteur,
								 	 DATE_FORMAT(date_creation, '- %d/%m à %H:%i') as date_creation_fr,
								 	 messages.sujet_id,
								 	 messages.categorie_sms_id,
								 	 sujets.titre
								FROM messages
								LEFT JOIN sujets
									ON sujet_id = sujets.id
								ORDER BY date_creation DESC LIMIT 0, 4
							");
	}

}