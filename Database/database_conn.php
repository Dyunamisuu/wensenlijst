<?php
class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbName = 'wishlist';
    protected $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Verbindingsfout: " . $e->getMessage());
        }
    }
}
