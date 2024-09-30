<?php

declare(strict_types=1);

require_once 'utility/QueryBuilder.php';
require_once 'utility/connection/base.php';

class User extends BaseModel
{
    private PDO $db;
 
    public function createUser(string $userId, string $email, string $userTag, string $password, bool $isSocial): string
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

    public function getUser(string $userId): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE u_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch() ?: null;
    }

    public function updateUser(string $id, string $email, string $userTag, string $password): bool
    {
        return (bool) Query::table('users')
            ->update([
                'email' => $email,
                'user_tag' => $userTag,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ])
            ->where('u_id', $id)
            ->execute();
    }

    public function deleteUser(string $id): bool
    {
        return (bool) Query::table('users')
            ->delete()
            ->where('u_id', $id)
            ->execute();
    }
}
