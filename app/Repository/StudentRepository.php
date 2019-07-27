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
     * @param array $photo
     * @return bool
     */
    public function create(array $data,array $photo): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("INSERT INTO $this->table (name,email,password,level,gpa,gender,image_path) VALUES ( :name, :email,:password,:level,:gpa,:gender,:image_path)");
            $stmt->bindValue(':name', $data['name']);
            $stmt->bindValue(':email', $data['email']);
            $stmt->bindValue(':password', md5($data['password']));
            $stmt->bindValue(':level', $data['level']);
            $stmt->bindValue(':image_path', $photo['name']);
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
    public function update(array $data): bool
    {
        $success = false;
        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("UPDATE $this->table set name=:name, email=:email,gender=:gender, level=:level, gpa=:gpa where id =:id");
            $stmt->bindValue(':id', $data['id']);
            $stmt->bindValue(':name', $data['name']);
            $stmt->bindValue(':email', $data['email']);
            $stmt->bindValue(':gender', $data['gender']);
            $stmt->bindValue(':level', $data['level']);
            $stmt->bindValue(':gpa',$data['gpa']);
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


    public function login ($email, $password){

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM $this->table WHERE email=:email AND password=:password limit 1");
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', md5($password));
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
     * getting student by email
     * @param string $email
     * @return student
     */
    public function getByEmail($email) {
      $result = null;

      try {
          $db = DBConnection::connect();
          $stmt = $db->prepare("SELECT * FROM $this->table where email = :email");
          $stmt->bindValue(':email', $email);
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
     * update image_Path by $email
     * @param string $email
     * @param string image_path
     */
    public function updateImagePath($email, $image_path) {
      $success = false;

      try {
          $db = DBConnection::connect();
          $stmt = $db->prepare("UPDATE $this->table set image_path=:image_path where email = :email");
          $stmt->bindValue(':email', $email);
          $stmt->bindValue(':image_path', $image_path);
          $stmt->execute();
      } catch (PDOException $e) {
          echo $e->getMessage();
          exit();
      }

      return;
    }

}
