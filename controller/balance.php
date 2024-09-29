<?php

require 'model/balance.php';

class BalanceController {

    private $balanceModel;

    public function __construct() {
        $this->balanceModel = new Balance();
    }

    // Endpoint for creating balance for a user
    public function createBalance($data) {
        return $this->balanceModel->createBalance($data['u_id'], $data['wallet_balance']);
    }

    // Endpoint for getting balance by user ID
    public function getBalance($u_id) {
        return $this->balanceModel->getBalance($u_id);
    }

    // Endpoint for updating balance for a user
    public function updateBalance($u_id, $data) {
        return $this->balanceModel->updateBalance($u_id, $data['wallet_balance']);
    }

    // Endpoint for deleting balance for a user
    public function deleteBalance($u_id) {
        return $this->balanceModel->deleteBalance($u_id);
    }
}
