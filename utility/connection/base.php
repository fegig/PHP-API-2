<?php
require_once 'dbase.php';
class BaseModel {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
}
