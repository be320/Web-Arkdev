<?php
function uploadFile()
{
    $target_dir = __DIR__ . "/../../images/";

    $target_file = $target_dir . basename($_FILES["image_path"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image_path"]["tmp_name"]);
        if ($check == false) {
            print 'first false';
            return false;
        }
    }

    // Check file size
    if ($_FILES["image_path"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        echo 'second false';
        return false;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jfif"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        echo 'third false';
        return false;
    }

    // start upload file
    if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
        // Upload success
        return $target_dir;

    } else {
        echo 'fourth false';
        return false;
    }
    exit();
}

