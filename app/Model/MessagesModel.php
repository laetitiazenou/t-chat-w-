<?php

namespace Model;

use\W\Model\Model;

class MessageModel extends Model {
	public function searchAllWithUsername($idSalon) {
		$query = "SELECT * FROM $this->table JOIN utilisateurs ON $this->table.id_utilisateur = utilisateurs.id WHERE id_salon = :id_salon";

		$stmt = $this->dbh->prepare($query);
		$stmt->bindParam(':id_salon', $idSalon);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}