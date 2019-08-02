<?php

/**
 * to load by instructor send instructorid in get paramters
 * to load by track send track in get paramters
 * to load by student send studentid in get paramters
 * if no paramter sent it loads all courses in database
 */

require_once(__DIR__ . '/../Repository/CourseRepository.php');
require_once(__DIR__ . '/../Repository/InstructorRepository.php');
require_once(__DIR__ . '/../Repository/TrackRepository.php');
require_once(__DIR__ . '/../Repository/StudentRepository.php');


$data = $_GET;
$response = [];

$courseRepo = new CourseRepository();
$studentRepo = new StudentRepository();

if(isset($data['accountid'])){
    if( !($studentRepo->getById($data['accountid'])) ){
        $response['courses'] = [];
        echo json_encode($response);
        exit();
    }

    $courses = $courseRepo->getAllId();
    $student_courses = $courseRepo->getIdsByStudent($data['accountid']);
    sendJSON($courses, $student_courses);
}
elseif(isset($data['instructorid'])) {
    $courses = $courseRepo->getByInstructor($data['instructorid']);
    sendJSON($courses);
}
elseif (isset($data['studentid'])) {
    $courses = $courseRepo->getByStudent($data['studentid']);
    sendJSON($courses);
}
elseif (isset($data['trackid'])) {
    $courses = $courseRepo->getByTrack($data['trackid']);
    sendJSON($courses);
}
else {
    $courses = $courseRepo->getAllId();
    sendJSON($courses);
}


function sendJSON($ids, $student_courses = null) {
    $courses = [];
    $instructors = [];
    $tracks = [];

    $courseRepo = new CourseRepository();
    $instructorRepo = new InstructorRepository();
    $trackRepo = new TrackRepository();

    foreach ($ids as $row) {

      $tmpCourse = $courseRepo->getByIdAsoc($row['course_id']);
      $tmpInstructor = $instructorRepo->getByIdAsoc($row['instructor_id']);
      $tmpTrack = $trackRepo->getByIdAsoc($row['track_id']);

      $trackidIndex = -1;

      if(!is_null($student_courses)){
          $curId = $row['course_id'];

          if(in_array($curId, $student_courses)) {
              $tmpCourse['enrolled'] = true;
          }
          else {
              $tmpCourse['enrolled'] = false;
          }
          $trackidIndex = -2;
      }

      //removing track_id from course
      array_splice($tmpCourse, $trackidIndex, 1);

      array_push($courses, $tmpCourse);
      array_push($instructors, $tmpInstructor);
      array_push($tracks, $tmpTrack);

    }

    for ($i = 0; $i < count($ids); $i++) {
      $courses[$i]['instructor'] = $instructors[$i];
      $courses[$i]['track'] = $tracks[$i];

    }

  $response['courses'] = $courses;
  $response = json_encode($response);

  echo $response;
}
