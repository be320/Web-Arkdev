<?php
require_once(__DIR__."/../Models/Course.php");
require_once(__DIR__."/../Models/Student.php");
require_once (__DIR__."/../Lib/DBConnection.php");

class EnrollmentRepository
{
     /**
     *
     * @var string
     */
    protected $table = 'student_has_course';

    public function addCourse($student, $course): bool{
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("INSERT INTO $this->table (course_id, student_id) VALUES(:course, :student)");
            $stmt->bindValue(':student',$student);
            $stmt->bindValue(':course',$course);
            $success = $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
    }
    return $success;
    }

    public function dropCourse($student, $course): bool
    {
        $success = false;
        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare("DELETE FROM $this->table WHERE student_id=:student AND course_id=:course");
            $stmt->bindValue(':student',$student);
            $stmt->bindValue(':course',$course);
            $success = $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        return $success;
    }

    public function getEnrollment($student, $course)
    {
        $result = null;

        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT count(*) FROM $this->table WHERE course_id = :cid AND student_id =:sid");
            $stmt->bindValue(':sid',$student);
            $stmt->bindValue(':cid',$course);
            $stmt->execute();
            $result = $stmt->fetchColumn();
        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
        return $result;
    }
}
