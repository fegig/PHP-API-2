<?php


class Levels extends BaseModel {

    public function createLevel($u_id, $current_level) {
        $stmt = $this->db->prepare("INSERT INTO LEVELS (u_id, current_level) VALUES (?, ?)");
        $stmt->execute([$u_id, $current_level]);
        return $this->db->lastInsertId();
    }

    public function getLevel($u_id) {
        $stmt = $this->db->prepare("SELECT * FROM LEVELS WHERE u_id = ?");
        $stmt->execute([$u_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateLevel($u_id, $current_level, $total_played, $play_today) {
        $stmt = $this->db->prepare("UPDATE LEVELS SET current_level = ?, total_played = ?, play_today = ? WHERE u_id = ?");
        return $stmt->execute([$current_level, $total_played, $play_today, $u_id]);
    }

    public function deleteLevel($u_id) {
        $stmt = $this->db->prepare("DELETE FROM LEVELS WHERE u_id = ?");
        return $stmt->execute([$u_id]);
    }
}
