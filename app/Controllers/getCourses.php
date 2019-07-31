<?php
$courseRepo = new CourseRepository();
$trackRepo = new TrackRepository();
$courses = [];
$flag = 0;
$data = $_GET;
//Conditions depending on search combinatoins entered by the user
if( isset($data['filter']) && !empty($data['filter']) ){
    if( (isset($data['courseName']) && !empty($data['courseName'])) && (isset($data['instructorName']) && empty($data['instructorName'])) && (isset($data['trackName']) && empty($data['trackName'])) ){
        $courses = $courseRepo->getByCourseName($data['courseName']);
    }
    elseif ((isset($data['courseName']) && empty($data['courseName'])) && (isset($data['instructorName']) && !empty($data['instructorName'])) && (isset($data['trackName']) && empty($data['trackName']))){
        $courses = $courseRepo->getByInstructorName($data['instructorName']);
    }
    elseif ((isset($data['courseName']) && empty($data['courseName'])) && (isset($data['instructorName']) && empty($data['instructorName'])) && (isset($data['trackName']) && !empty($data['trackName']))){
        $courses = $courseRepo->getByTrackName($data['trackName']);
    }
    elseif ((isset($data['courseName']) && !empty($data['courseName'])) && (isset($data['instructorName']) && empty($data['instructorName'])) && (isset($data['trackName']) && !empty($data['trackName']))){
        $courses = $courseRepo->getByCourseNameAndTrackName($data['courseName'], $data['trackName']);
    }
    elseif ((isset($data['courseName']) && !empty($data['courseName'])) && (isset($data['instructorName']) && !empty($data['instructorName'])) && (isset($data['trackName']) && empty($data['trackName']))){
        $courses = $courseRepo->getByCourseNameAndInstructorName($data['courseName'], $data['instructorName']);
    }
    elseif ((isset($data['courseName']) && empty($data['courseName'])) && (isset($data['instructorName']) && !empty($data['instructorName'])) && (isset($data['trackName']) && !empty($data['trackName']))){
        $courses = $courseRepo->getByInstructorNameAndTrackName($data['instructorName'], $data['trackName']);
    }
    elseif ((isset($data['courseName']) && !empty($data['courseName'])) && (isset($data['instructorName']) && !empty($data['instructorName'])) && (isset($data['trackName']) && !empty($data['trackName']))){
        $courses = $courseRepo->getByCourseNameAndInstructorNameAndTrackName($data['courseName'], $data['instructorName'], $data['trackName']);
    }
    else{
        $courses = $courseRepo->getAll();
    }
}
else {
    $courses = $courseRepo->getAll();
}
if(isset($data['state']) && $data['state'] === 'courseAdded'){
    $flag = 1;
}