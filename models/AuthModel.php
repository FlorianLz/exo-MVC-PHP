<?php
namespace models;

use models\base\SQL;
use utils\SessionHelpers;

class AuthModel extends SQL
{
    public function __construct()
    {
        parent::__construct('users', 'id');
    }
    public static function createUser($infos){
        $hash = password_hash($infos['password'], PASSWORD_DEFAULT);
        try {
            $stmt = self::getPdo()->prepare("INSERT INTO users (email, password, nom, prenom) VALUES (?, ?, ?, ?)");
            $stmt->execute([$infos['email'], $hash, $infos['nom'], $infos['prenom']]);
            return [
                'id' => self::getPdo()->lastInsertId(),
                'email' => $infos['email'],
                'nom' => $infos['nom'],
                'prenom' => $infos['prenom']
            ];
        } catch (\PDOException $e) {
            return [];
        }
    }

    public static function getUserByEmail(mixed $email)
    {
        $stmt = self::getPdo()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}