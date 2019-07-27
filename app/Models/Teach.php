<?php
class Teach {

    protected $course_id;
    protected $instructor_id;


    public function __construct()
    {
    }

    /**
     * @param mixed $course_id
     */
    public function setCourseId($course_id)
    {
        $this->course_id = $course_id;
    }

    /**
     * @return mixed
     */
    public function getCourseId()
    {
        return $this->course_id;
    }

    /**
     * @return mixed
     */
    public function getInstructorId()
    {
        return $this->instructor_id;
    }

    /**
     * @param mixed $instructor_id
     */
    public function setInstructorId($instructor_id)
    {
        $this->instructor_id = $instructor_id;
    }




}