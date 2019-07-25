<?php

require_once(__DIR__ . '/../Lib/DBConnection.php');
require_once(__DIR__ . '/../Models/Admin.php');

class AdminRepository
{
    /**
     *
     * @var string
     */
    protected $table = 'admin';

    /**
     * AdminRepository constructor.
     *
     */
    public function __construct()
    {
    }

    /**
     * Create Admin
     *
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("INSERT INTO $this->table (name, email, password) VALUES (:name, :email, :password)");
            $stmt->bindValue(':name', $data['name']);
            $stmt->bindValue(':email', $data['email']);
            $stmt->bindValue(':password', md5($data['password']));
            $success = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $success;
    }

    /**
     * Get all Admins
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
            $stmt->setFetchMode(PDO::FETCH_CLASS, Admin::class);
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $result;
    }

    /**
     * Get Admin by id
     *
     * @return Admin
     */
    public function getById($id)
    {
        $result = null;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM $this->table where id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Admin::class);
            $result = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $result;
    }

    /**
     * Update Admin
     *
     * @param Admin $Admin
     * @return bool
     */
    public function update(Admin $Admin): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("UPDATE $this->table set name=:name, email=:email, password=:password where id = :id");
            $stmt->bindValue(':id', $Admin->getId());
            $stmt->bindValue(':name', $Admin->getname());
            $stmt->bindValue(':email', $Admin->getEmail());
            $stmt->bindValue(':password', md5($Admin->getPassword()));
            $success = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $success;
    }

    /**
     * Update Admin
     *
     * @param int $Admin
     * @return bool
     */
    public function deleteById($id): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("DELETE FROM $this->table where id = :id");
            $stmt->bindValue(':id', $id);
            $success = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $success;
    }

    /**
     * Admin login
     *
     * @param $email
     * @param $password
     * @return Admin|null
     */
    public function login($email, $password)
    {
        $result = null;
        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM $this->table where email = :email and password = :password limit 1");
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', md5($password));
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Admin::class);
            $result = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return $result;
    }
}