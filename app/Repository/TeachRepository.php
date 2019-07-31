<?php
require_once(__DIR__ . "/../Models/Teach.php");
require_once(__DIR__ . "/../Lib/DBConnection.php");

class TeachRepository
{
    protected $table = 'course_has_instructor';

    public function create($data): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("INSERT INTO course_has_instructor (course_id, instructor_id) VALUES (:course_id, :instructor_id)");
            $stmt->bindValue(':course_id', $data['course_id']);
            $stmt->bindValue(':instructor_id', $data['instructor_id']);
            $success = $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return $success;
    }

    public function unassign($data): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("DELETE FROM course_has_instructor WHERE course_id = :course_id AND instructor_id = :instructor_id");
            $stmt->bindValue(':course_id', $data['course_id']);
            $stmt->bindValue(':instructor_id', $data['instructor_id']);
            $success = $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return $success;
    }

    public function checkExist($courseId,$instructorId):bool
    {
        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare('SELECT * FROM course_has_instructor WHERE course_id = :course_id AND instructor_id = :instructor_id');
            $stmt->bindValue(':course_id',$courseId);
            $stmt->bindValue(':instructor_id',$instructorId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS,Teach::class);
            $result = $stmt->fetchAll();
        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
        if(empty($result)){
            return false;
        }
        return true;

    }
}