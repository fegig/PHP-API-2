<?php

class Balance extends BaseModel {

    public function createBalance($u_id, $wallet_balance) {
        $stmt = $this->db->prepare("INSERT INTO Balance (u_id, wallet_balance) VALUES (?, ?)");
        $stmt->execute([$u_id, $wallet_balance]);
        return $this->db->lastInsertId();
    }

    public function getBalance($u_id) {
        $stmt = $this->db->prepare("SELECT * FROM Balance WHERE u_id = ?");
        $stmt->execute([$u_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateBalance($u_id, $wallet_balance) {
        $stmt = $this->db->prepare("UPDATE Balance SET wallet_balance = ? WHERE u_id = ?");
        return $stmt->execute([$wallet_balance, $u_id]);
    }

    public function deleteBalance($u_id) {
        $stmt = $this->db->prepare("DELETE FROM Balance WHERE u_id = ?");
        return $stmt->execute([$u_id]);
    }
}
