<?php

require 'model/finance.php';

class FinanceController {

    private $financeModel;

    public function __construct() {
        $this->financeModel = new Finance();
    }

    // Endpoint for creating a finance transaction for a user
    public function createFinance($data) {
        return $this->financeModel->createFinance($data['u_id'], $data['trans_id'], $data['amount'], $data['wallet_address'], $data['status']);
    }

    // Endpoint for getting finance transactions by user ID
    public function getFinance($u_id) {
        return $this->financeModel->getFinance($u_id);
    }

    // Endpoint for updating a finance transaction
    public function updateFinance($id, $data) {
        return $this->financeModel->updateFinance($id, $data['status']);
    }

    // Endpoint for deleting a finance transaction
    public function deleteFinance($id) {
        return $this->financeModel->deleteFinance($id);
    }
}
