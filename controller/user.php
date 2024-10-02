<?php

require_once 'model/user.php';
require_once 'utility/errorHandler.php';

require_once 'utility/validator.php';
require_once 'utility/response.php'; 

class UserController {

    private User $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function createUser($data) {
        try {
            Validator::validate($data, [
                'userId' => 'required|string',
                'email' => 'required|email',
                'user_tag' => 'required|string',
                'password' => 'required|string',
                'isSocial' => 'required|boolean',
            ]);
           
            $result = $this->userModel->createUser(
                $data['userId'],
                $data['email'],
                $data['user_tag'],
                $data['password'],
                $data['isSocial']
            );

            successResponse($result, 201);
        } catch (InvalidArgumentException $e) {
            errorResponse($e->getMessage(), 400);
        }
    }

    public function getUser($userId = null) {
        try {
            // If $userId is not provided as a path parameter, check for query parameter
            if ($userId === null) {
                $userId = $_GET['userId'] ?? null;
            }

            Validator::validate(['userId' => $userId], [
                'userId' => 'required|string',
            ]);

            $user = $this->userModel->getUser($userId);
            
            if ($user) {
                successResponse($user, 200);
            } else {
                errorResponse('User not found', 404);
            }
        } catch (InvalidArgumentException $e) {
            errorResponse($e->getMessage(), 400);
        }
    }

       
    public function updateUser($id, $data) {
        try {
            Validator::validate($data, [
                'email' => 'required|email',
                'user_tag' => 'required|string',
                'password' => 'required|string',
            ]);

            $result = $this->userModel->updateUser(
                $id,
                $data['email'],
                $data['user_tag'],
                $data['password']
            );

            if ($result) {
                successResponse(['message' => 'User updated successfully']);
            } else {
                errorResponse('User not found or update failed', 404);
            }
        } catch (InvalidArgumentException $e) {
            errorResponse($e->getMessage(), 400);
        }
    }

    public function deleteUser(int $id) {
        $result = $this->userModel->deleteUser($id);
        
        if ($result) {
            successResponse(['message' => 'User deleted successfully']);
        } else {
            errorResponse('User not found or delete failed', 404);
        }
    }
}

