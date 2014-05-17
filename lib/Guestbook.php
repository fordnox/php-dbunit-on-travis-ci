<?php

namespace Fordnox;

/**
 * Class Guestbook
 */
class Guestbook
{
    private $pdo;

    public function setPdo(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addEntry($user, $content)
    {
        $sql="
        INSERT INTO `guestbook` (`content`, `user`, `created`)
        VALUES (:content,  :username,  NOW());
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':content', $content);
        $stmt->bindValue(':username', $user);
        $stmt->execute();
    }
}
