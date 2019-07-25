<?php

require_once(__DIR__ . '/../Lib/DBConnection.php');
require_once(__DIR__ . '/../Models/Student.php');

class StudentRepository
{
    /**
     *
     * @var string
     */
    protected $table = 'student';

    /**
     * StudentRepository constructor.
     *
     */
    public function __construct()
    {
    }

    /**
     * Create student
     *
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("INSERT INTO $this->table (id,name,email,password,level,image_path,gpa,gender) VALUES (:id, :name, :email,:password,:level,:image_path,:gpa,:gender)");
            $stmt->bindValue(':id', $data['id']);
            $stmt->bindValue(':name', $data['name']);
            $stmt->bindValue(':email', $data['email']);
            $stmt->bindValue(':password', md5($data['password']));
            $stmt->bindValue(':level', $data['level']);
            $stmt->bindValue(':image_path', $data['image_path']);
            $stmt->bindValue(':gpa', $data['gpa']);
            $stmt->bindValue(':gender', $data['gender']);
            $success = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $success;
    }

    /**
     * Get all students
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
            $stmt->setFetchMode(PDO::FETCH_CLASS, Student::class);
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $result;
    }

    /**
     * Get student by id
     *
     * @return Student
     */
    public function getById($id)
    {
        $result = null;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM $this->table where id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Student::class);
            $result = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $result;
    }

    /**
     * Update student
     *
     * @param Student $student
     * @return bool
     */
    public function update(Student $student): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("UPDATE $this->table set name=:name, email=:email,gender=:gender, level=:level, gpa=:gpa,image_path=:image_path where id = :id");
            $stmt->bindValue(':id', $student->getId());
            $stmt->bindValue(':name', $student->getName());
            $stmt->bindValue(':email', $student->getEmail());
            $stmt->bindValue(':gender', $student->getGender());
            $stmt->bindValue(':level', $student->getLevel());
            $stmt->bindValue(':image_path', $student->getImagePath());
            $stmt->bindValue(':gpa', $student->getGpa());
            $success = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return $success;
    }

    /**
     * Update student
     *
     * @param int $student
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
}