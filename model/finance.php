<?php


class Finance extends BaseModel {

    public function createFinance($u_id, $trans_id, $amount, $wallet_address, $status) {
        $stmt = $this->db->prepare("INSERT INTO Finance (u_id, trans_id, amount, wallet_address, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$u_id, $trans_id, $amount, $wallet_address, $status]);
        return $this->db->lastInsertId();
    }

    public function getFinance($u_id) {
        $stmt = $this->db->prepare("SELECT * FROM Finance WHERE u_id = ?");
        $stmt->execute([$u_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateFinance($id, $status) {
        $stmt = $this->db->prepare("UPDATE Finance SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    public function deleteFinance($id) {
        $stmt = $this->db->prepare("DELETE FROM Finance WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
