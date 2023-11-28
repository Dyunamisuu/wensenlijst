<?php
require_once __DIR__ . '/../database/database_conn.php';


class Wish extends Database {
    public function getWishes($userId) {
        $stmt = $this->pdo->prepare("SELECT * FROM wishes WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
