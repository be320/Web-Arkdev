<?php
require_once(__DIR__."/../Models/Course.php");
require_once (__DIR__."/../Lib/DBConnection.php");

class CourseRepository
{
    protected $table = 'course';

    public function create($data): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("INSERT INTO course (name, description, track_id) VALUES (:fname,:description,:track_id)");
            $stmt->bindValue(':fname',$data['name']);
            $stmt->bindValue(':description',$data['description']);
            $stmt->bindValue(':track_id',$data['track_id']);

            $success = $stmt->execute();

        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
    }
    return $success;
    }

    public function deleteById($id): bool
    {
        $success = false;
        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare("DELETE FROM course WHERE id = :id");
            $success = $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
        return $success;
    }

    /**
     * @return string
     */
    public function getById($id): course
    {
        $result = null;
        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM course WHERE id=:id");
            $stmt->bindValue(':id',$id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Course::class);
            $result = $stmt->fetch();
            print_r($result);


        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
        return $result;
    }

    public function update($course): bool
    {
        $success = false;
        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("UPDATE course set name=:name, description=:description, image_path=:image_path, track_id=:track_id where id = :id");
            $stmt->bindValue(':name', $course->getName());
            $stmt->bindValue(':description', $course->getDescription());
            $stmt->bindValue(':image_path', $course->getImagePath());
            $stmt->bindValue(':track_id', $course->getTrackId());
            $stmt->bindValue(':id', $course->getID());
            $success = $stmt->fetch();
        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }

        return $success;
    }

    /**
     * @return string
     */
    public function updateImagePath($filePath, $data): bool
    {
        $success = false;
        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("UPDATE $this->table set image_path=:image_path where name = :anme, decription = :description, tracj_id = : track_id");
            $stmt->bindValue(':name', $data['name']);
            $stmt->bindValue(':description', $data['description']);
            $stmt->bindValue(':track_id', $data['track_id']);
        }catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
        return $success;

    }

    public function getAll(): array
    {
        $result = [];
        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * from course");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Course::class);
            $result =$stmt->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
        return $result;

    }

    public function checkExist($id): bool
    {
        $result = $this->getById($id);
        if(empty($result)){
            return false;
        }
        return true;
    }

}