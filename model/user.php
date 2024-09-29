<?php
require 'utility/connection/base.php';


class User extends BaseModel {

    public function createUser($u_id, $email, $user_tag, $password, $isSocial) {
        $stmt = $this->db->prepare("INSERT INTO User (u_id, email, user_tag, password, isSocial) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$u_id, $email, $user_tag, password_hash($password, PASSWORD_BCRYPT), $isSocial]);
        return $this->db->lastInsertId();
    }

    public function getUser($id) {
        $stmt = $this->db->prepare("SELECT * FROM User WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $email, $user_tag, $password) {
        $stmt = $this->db->prepare("UPDATE User SET email = ?, user_tag = ?, password = ? WHERE id = ?");
        return $stmt->execute([$email, $user_tag, password_hash($password, PASSWORD_BCRYPT), $id]);
    }

    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM User WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
