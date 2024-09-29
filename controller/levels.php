<?php

require 'model/levels.php';

class LevelsController {

    private $levelsModel;

    public function __construct() {
        $this->levelsModel = new Levels();
    }

    // Endpoint for creating level data for a user
    public function createLevel($data) {
        return $this->levelsModel->createLevel($data['u_id'], $data['current_level']);
    }

    // Endpoint for getting level data by user ID
    public function getLevel($u_id) {
        return $this->levelsModel->getLevel($u_id);
    }

    // Endpoint for updating level data for a user
    public function updateLevel($u_id, $data) {
        return $this->levelsModel->updateLevel($u_id, $data['current_level'], $data['total_played'], $data['play_today']);
    }

    // Endpoint for deleting level data for a user
    public function deleteLevel($u_id) {
        return $this->levelsModel->deleteLevel($u_id);
    }
}
