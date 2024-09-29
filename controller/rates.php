<?php

require 'model/rates.php';

class RatesController {

    private $ratesModel;

    public function __construct() {
        $this->ratesModel = new Rates();
    }

    // Endpoint for creating a new rate
    public function createRate($data) {
        return $this->ratesModel->createRate($data['equiv']);
    }

    // Endpoint for getting all rates
    public function getRates() {
        return $this->ratesModel->getRates();
    }

    // Endpoint for updating a rate
    public function updateRate($id, $data) {
        return $this->ratesModel->updateRate($id, $data['equiv']);
    }

    // Endpoint for deleting a rate
    public function deleteRate($id) {
        return $this->ratesModel->deleteRate($id);
    }
}
