<?php

class Rates extends BaseModel {

    public function createRate($equiv) {
        $stmt = $this->db->prepare("INSERT INTO Rates (equiv) VALUES (?)");
        $stmt->execute([$equiv]);
        return $this->db->lastInsertId();
    }

    public function getRates() {
        $stmt = $this->db->prepare("SELECT * FROM Rates");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateRate($id, $equiv) {
        $stmt = $this->db->prepare("UPDATE Rates SET equiv = ? WHERE id = ?");
        return $stmt->execute([$equiv, $id]);
    }

    public function deleteRate($id) {
        $stmt = $this->db->prepare("DELETE FROM Rates WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
