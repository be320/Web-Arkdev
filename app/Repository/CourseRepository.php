<?php
require_once(__DIR__."/../Models/Course.php");
require_once (__DIR__."/../Lib/DBConnection.php");

class CourseRepository
{
    protected $table = 'course';

    public function create($data,array $photo): bool
    {
        $success = false;

        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare("INSERT INTO course (name, description, track_id, image_path) VALUES (:fname,:description,:track_id, :image_path)");
            $stmt->bindValue(':fname',$data['name']);
            $stmt->bindValue(':description',$data['description']);
            $stmt->bindValue(':track_id',$data['track_id']);
            $stmt->bindValue(':image_path',$photo['name']);

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
            $stmt->bindValue(':id',$id);
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
            $stmt = $db->prepare("UPDATE course set name=:name, description=:description, track_id=:track_id where id = :id");
            $stmt->bindValue(':name', $course->getName());
            $stmt->bindValue(':description', $course->getDescription());
            $stmt->bindValue(':track_id', $course->getTrackId());
            $stmt->bindValue(':id', $course->getID());
            $success = $stmt->execute();
        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }

        return $success;
    }

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

    public function getByCourseName($courseName): array
    {
        $result = [];
        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare('SELECT * FROM course WHERE name LIKE :courseName');
            $stmt->bindValue(':courseName',"%$courseName%");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS,Course::class);
            $result = $stmt->fetchAll();
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        return $result;
    }

    public function getByInstructorName($instructorName): array
    {
        $result = [];
        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare('SELECT * from course WHERE id IN(SELECT course_id FROM course_has_instructor WHERE instructor_id IN (SELECT id FROM instructor WHERE name LIKE :instructorName ))');
            $stmt->bindValue(':instructorName',"%$instructorName%");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS,Course::class);
            $result = $stmt->fetchAll();
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        return $result;
    }

    public function getByTrackName($trackName): array
    {
        $result = [];
        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare('SELECT * FROM course WHERE track_id IN(SELECT id FROM track WHERE name LIKE :trackName)');
            $stmt->bindValue(':trackName',"%$trackName%");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS,Course::class);
            $result = $stmt->fetchAll();
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        return $result;
    }

    public function getByCourseNameAndTrackName($courseName, $trackName): array
    {
        $result = [];
        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare('SELECT * from course WHERE name LIKE :courseName AND track_id IN(SELECT id FROM track WHERE name LIKE :trackName)');
            $stmt->bindValue(':courseName', "%$courseName%");
            $stmt->bindValue(':trackName', "%$trackName%");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Course::class);
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }


    public function getByCourseNameAndInstructorName($courseName, $instructorName): array
    {
        $result = [];
        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare('SELECT * FROM course WHERE name LIKE :courseName AND id IN(SELECT course_id from course_has_instructor WHERE instructor_id IN(SELECT id FROM instructor WHERE name LIKE :instructorName))');
            $stmt->bindValue(':courseName', "%$courseName%");
            $stmt->bindValue(':instructorName', "%$instructorName%");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Course::class);
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function getByInstructorNameAndTrackName($instructorName, $trackName): array
    {
        $result = [];
        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare('SELECT * FROM course WHERE track_id IN(SELECT id from track WHERE name LIKE :trackName) AND id IN(SELECT course_id FROM course_has_instructor WHERE instructor_id IN(SELECT id FROM instructor WHERE name LIKE :instructorName))');
            $stmt->bindValue(':trackName', "%$trackName%");
            $stmt->bindValue(':instructorName', "%$instructorName%");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Course::class);
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function getByCourseNameAndInstructorNameAndTrackName($courseName, $instructorName, $trackName): array
    {
        $result = [];
        try {
            $db = DBConnection::connect();
            $stmt = $db->prepare('SELECT * FROM course WHERE name LIKE :courseName AND id IN(SELECT course_id FROM course_has_instructor WHERE instructor_id IN(SELECT id FROM instructor WHERE name LIKE :instructorName)) AND track_id IN(SELECT id FROM track WHERE name LIKE :trackName)');
            $stmt->bindValue(':courseName', "%$courseName%");
            $stmt->bindValue(':trackName', "%$trackName%");
            $stmt->bindValue(':instructorName', "%$instructorName%");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Course::class);
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $result;
    }

    public function checkCourseNameExists($name): bool
    {
        $result=[];
        try{
            $db = DBConnection::connect();
            $stmt = $db->prepare('SELECT * FROM course WHERE name = :name');
            $stmt->bindValue(':name', $name);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Course::class);
            $result = $stmt->fetchAll();
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        if(empty($result)){
            return false;
        }
        return true;
    }

    public function checkTrackIdExists($id):bool
    {
        $result=[];
        try{
            echo '1';
            $db = DBConnection::connect();
            $stmt = $db->prepare('SELECT * FROM track WHERE id = :id');
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, Track::class);
            $result = $stmt->fetchAll();
            var_dump($stmt);
            var_dump($result);
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        if(empty($result)){
            return true;
        }
        return false;

    }




}

