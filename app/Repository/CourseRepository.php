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



    /**
     * get ids of a course with a specific track
     * @param $trackid
     * @return array of course_ids, instructor_ids, track_ids
     *
     */
    public function getByTrack($trackId) {
      $result = [];

      try {
          $db = DBConnection::connect();
          $stmt = $db->prepare("SELECT course_id, instructor_id, track_id FROM course AS C, course_has_instructor AS CHI, instructor AS I WHERE CHI.course_id = C.id AND CHI.instructor_id = I.id AND C.track_id = :track_id;");
          $stmt->bindValue(':track_id', $trackId);
          $success = $stmt->execute();
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $result = $stmt->fetchAll();

      }
      catch (PDOException $e){
          echo $e->getMessage();
          exit();
      }
      return $result;

    }

    /**
     * get ids of a course with a specific instructor
     * @param $instructorId
     * @return array of course_ids, instructor_ids, track_ids
     *
     */
    public function getByInstructor($instructorId) {
      $result = [];

      try {
          $db = DBConnection::connect();
          $stmt = $db->prepare("SELECT course_id, instructor_id, track_id FROM course AS C, course_has_instructor AS CHI, instructor AS I WHERE CHI.course_id = C.id AND CHI.instructor_id = I.id AND I.id = :instructorId;");
          $stmt->bindValue(':instructorId', $instructorId);
          $success = $stmt->execute();
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $result = $stmt->fetchAll();

      }
      catch (PDOException $e){
          echo $e->getMessage();
          exit();
      }
      return $result;

    }

    /**
     * get ids of a course enrolled by a specific student
     * @param $studentId
     * @return array of course_ids, instructor_ids, track_ids
     *
     */
    public function getByStudent($studentId) {
      $result = [];

      try {
          $db = DBConnection::connect();
          $stmt = $db->prepare("SELECT course_id, instructor_id, track_id from course_has_instructor AS CHI, course, instructor, track
            WHERE course.track_id = track.id AND course.id = CHI.course_id AND CHI.instructor_id = instructor.id AND course_id = ANY
            (SELECT course_id FROM student_has_course AS SHC where SHC.student_id = :studentId);");
          $stmt->bindValue(':studentId', $studentId);
          $success = $stmt->execute();
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $result = $stmt->fetchAll();

      }
      catch (PDOException $e){
          echo $e->getMessage();
          exit();
      }
      return $result;

    }

    /**
     * return course by an assoc array
     * @param $courseId
     * @return array
     */
    public function getByIdAsoc($courseId)
    {
        $result = null;

        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT * FROM course WHERE id=:id");
            $stmt->bindValue(':id',$courseId);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
        return $result;
    }

    /**
     * return all course ids
     * @return array
     */
    public function getAllId()
    {
        $result = null;

        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare("SELECT course_id, instructor_id, track_id FROM course AS C, course_has_instructor AS CHI, instructor AS I WHERE CHI.course_id = C.id AND CHI.instructor_id = I.id");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
        return $result;
    }


}

