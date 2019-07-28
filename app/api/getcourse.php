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


$data = $_GET;
$response = [];

$courseRepo = new CourseRepository();

if(isset($data['instructorid'])) {
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



function sendJSON($ids) {
  $courses = [];
  $instructors = [];
  $tracks = [];

  $courseRepo = new CourseRepository();
  $instructorRepo = new InstructorRepository();
  $trackRepo = new TrackRepository();

  foreach ($ids as $row) {

    $tmpCourse = $courseRepo->getByIdAsoc($row['course_id']);
    $tmpInstructor = $instructorRepo->getById($row['instructor_id']);
    $tmpTrack = $trackRepo->getByIdAsoc($row['track_id']);


    //removing track_id from course
    array_splice($tmpCourse, -1);

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
