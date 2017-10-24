<?php
namespace App\Table;

use Core\Table\Table;

/**
* 
*/
class ImageTable extends Table
{

	public function addFiles($titre, $img){
        return $this->db->prepare("INSERT INTO images
                        SET titre = ?, images = ?",
                        array($titre, $img));
    }

}