<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class UserTable extends Table
{

	public function find($id)
	{
		return $this->query("SELECT users.id,
									 users.name,
									 users.password,
									 users.mail,
									 DATE_FORMAT(date_inscription, '%d/%m/%Y') as date_inscription_fr,
									 DATE_FORMAT(date_de_naissance, '%d/%m/%Y') as date_naissance_fr,
									 users.membre_rang,
									 users.signature,
									 users.image
									 FROM users WHERE id = ?",[$id], true);
	}

	public function lastUser()
	{
		return $this->query("SELECT * FROM users ORDER BY users.id DESC LIMIT 0, 5");
	}

	public function oneUser()
	{
		return $this->query("SELECT * FROM users ORDER BY users.id DESC LIMIT 0, 1");
	}

	public function nombreUser()
	{
		return $this->query("SELECT id FROM users");
	}
	public function pseudo(){
		return $this->query("SELECT name FROM users");
	}
}