<?php
namespace App\Table;

use Core\Table\Table;
/**
*
*/
class PostTable extends Table
{
	protected $table = "articles";

	public function allAdd()
	{
		return $this->query(" SELECT articles.id,
									articles.titre,
									articles.contenu,
									DATE_FORMAT(date_creation, '%d/%m/%Y') as date_creation_fr,
									articles.category_id,
									articles.auteur,
									articles.img
								FROM articles
								ORDER BY articles.id DESC
							");
	}

	public function addPost($titre, $contenu, $auteur, $date_creation, $img){
        return $this->db->prepare("INSERT INTO articles
                        SET titre = ?, contenu = ?, auteur = ?, date_creation = ?, img = ?",
                        array($titre, $contenu, $auteur, $date_creation, $img));
    }

	public function nombre($id)
	{
		return $this->query(" SELECT articles.titre,
								articles.auteur,
								articles.date_creation,
								COUNT(category_id)
								as category
								FROM articles
								LEFT JOIN categories
								ON category_id = categories.id
								WHERE categories.id = ?
							", [$id]);
	}

	public function last()
	{
		return $this->query(" SELECT articles.id,
									articles.titre,
									articles.contenu,
									DATE_FORMAT(date_creation, '%d/%m/%Y') as date_creation_fr,
									articles.category_id,
									articles.auteur,
									articles.img,
									categories.titre as category
								FROM articles
								LEFT JOIN categories
									ON articles.category_id = categories.id
								ORDER BY articles.date_creation DESC
							");
	}

	public function lastRecent()
	{
		return $this->query(" SELECT articles.id,
									articles.titre,
									articles.contenu,
									DATE_FORMAT(date_creation, '%d/%m/%Y') as date_creation_fr,
									articles.category_id,
									articles.auteur,
									articles.img,
									categories.titre as category
								FROM articles
								LEFT JOIN categories
									ON articles.category_id = categories.id
								ORDER BY articles.date_creation DESC
								LIMIT 0, 4

							");
	}

	public function find($id)
	{
		return $this->query(" SELECT articles.id,
									articles.titre,
									articles.contenu,
									articles.date_creation,
									articles.auteur,
									articles.img,
									categories.titre as category
								FROM articles
								LEFT JOIN categories
									ON category_id = categories.id
								WHERE articles.id = ?
							", [$id], true);
	}

	public function lastByCategory($category_id, $one=false)
	{
		return $this->query(" SELECT articles.id,
									articles.titre,
									articles.contenu,
									articles.date_creation,
									articles.auteur,
									categories.titre as category
								FROM articles
								LEFT JOIN categories
									ON category_id = categories.id
								WHERE categories.id = ?
								ORDER BY articles.date_creation DESC
							", [$category_id], $one);
	}
}