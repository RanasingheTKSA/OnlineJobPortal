<?php

    require_once 'config.php';

if(isset($_POST['submit']))
{
    $email          = $_POST["email"];
    $title          = $_POST["jobtitle"];
    $region         = $_POST["jobregion"];
    $salary1        = $_POST["salary1"];
    $salary2        = $_POST["salary2"];
    $location       = $_POST["location"];
    $category       = $_POST["category"];
    $age            = $_POST["age"];
    $phoneNum       = $_POST["contcatno"];
    $qulification   = $_POST["qlevel"];
    $description    = $_POST["details"];
    $Price          = $_POST["policy"];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $logo=$_FILES["fileToUpload"]["name"];
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
    } else {
    echo "File is not an image.";
    $uploadOk = 0;
    }


    //Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file name is already exists. Please try a differant name";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 8000000) {
     echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    //  $cv=$_FILES['cv'];
    if($uploadOk == 1){
    $result=mysqli_query($link,"INSERT INTO `job`(`email`, `title`, `region`, `salary1`, `salary2`, `location`, `category`, `age`, `phoneNum`, `qualifications`, `description`,`logo`)
    VALUES ('$email','$title' ,'$region','$salary1','$salary2','$location','$category','$age','$phoneNum','$qulification','$description','$logo')");
     // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    }     else {
       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
         echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
    if(!empty($result))
    {
      echo "insert success";
    }
    else
    {
        echo "error";
    }
    }

    }

?>
