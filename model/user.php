<?php

declare(strict_types=1);

require_once 'utility/connection/QueryBuilder.php';

class User
{
 
    public function createUser(string $userId, string $email, string $userTag, string $password, bool $isSocial)
    {
        return Query::table('users')
            ->insert([
                'u_id' => $userId,
                'email' => $email,
                'user_tag' => $userTag,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'is_social' => $isSocial
            ])
            ->execute();
    }

    public function getUser(string $userId)
    {
        return Query::table('User')
            ->select(['*'])
            ->where('User.u_id', $userId)
            // ->innerJoin('Levels', 'User.u_id', '=', 'Levels.u_id')
            ->limit(1)
             ->debug()
            ->execute();
        
    }

    
    public function updateUser(string $id, string $email, string $userTag, string $password): bool
    {
        $result = Query::table('users')
            ->update([
                'email' => $email,
                'user_tag' => $userTag,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ])
            ->where('u_id', $id)
            ->execute();

        return $result > 0;
    }

    public function deleteUser(string $id): bool
    {
        $result = Query::table('users')
            ->delete()
            ->where('u_id', $id)
            ->execute();

        return $result > 0;
    }

    private function mapToObject(array $data): User
    {
        $user = new User();
        foreach ($data as $key => $value) {
            if (property_exists($user, $key)) {
                $user->$key = $value;
            }
        }
        return $user;
    }
}
