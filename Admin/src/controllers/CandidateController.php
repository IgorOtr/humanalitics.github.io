<?php

require '../classes/Candidate.php';
$class = new Candidate;

if (isset($_POST['apply'])) {

    $name = $_POST['candidate-name'];
    $email = $_POST['candidate-email'];
    $phone = $_POST['candidate-phone'];
    $date = $_POST['candidate-date'];
    $adress = $_POST['candidate-adress'];
    $city = $_POST['candidate-city'];
    $school = $_POST['candidate-school'];
    $resume = $_POST['candidate-resume'];
    $ask =  $_POST['candidate-ask'];
    $history = $_POST['candidate-history'];
    $list = $_POST['candidate-list'];
    $preference = $_POST['candidate-preference'];
    $job_id = $_POST['job-id'];
    $file = $_FILES['candidate-file'];

        $UploadFileToFolder = Candidate::UploadFileToFolder($file);

            if ($UploadFileToFolder[0]) {

                $add = $class->AddCandidate($name, $email, $phone, $date, $adress, $city, $school, $resume, $ask, $history, $list, $preference, $job_id, $UploadFileToFolder[1]);
            }

    

}