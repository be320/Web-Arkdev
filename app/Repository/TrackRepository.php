<?php

require_once(__DIR__ . '/../Lib/DBConnection.php');
require_once(__DIR__ . '/../Models/Track.php');

class TrackRepository
{
    protected $table = 'track';
    
      public function __construct()
    {
    }

    public function create(array $data) : bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("INSERT INTO $this->table ( name) VALUES ( :n)");
            $stmt->bindValue(':n', $data['name']);
            $success = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $success;
    }

    /**
     * Get all users
     *
     * @return array
     */
    public function getAll(): array
    {
        $result = [];

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM $this->table");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Track::class);
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $result;
    }
    public function deleteById($id):bool
    {
try{
    $db = DBConnection:: connect();
    $stmt = $db ->prepare("DELETE FROM $this ->table where id = :id");
    $stmt ->bindValue(':id', $id);
    $success = $stmt ->execute();
    
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}

return $success;
}



public function update(Track $track): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("UPDATE $this->table set name=:n where id = :t");
            $stmt->bindValue(':n', $track->getName());
            $stmt->bindValue(':t', $track->getId());
            $success = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $success;
    }
    

}