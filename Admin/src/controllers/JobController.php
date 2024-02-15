<?php
require "../classes/Jobs.php";

$classJob = new Job();
$action = isset($_GET['action']) ? $_GET['action'] : '';
$job_id = isset($_GET['job_id']) ? $_GET['job_id'] : '';

if (isset($_POST['add_new_job'])) {
    
    $title = $_POST['job_title'];
    $sub_title = $_POST['job_sub_title'];
    $job_description = $_POST['job_description'];
    $job_image = $_FILES['job_image'];
    $limit_date = $_POST['limit_date'];
    $status = 'ativo';
    $limit_date = explode('-',$limit_date);
    $limit_date = $limit_date[2].'/'.$limit_date[1].'/'.$limit_date[0];


    $addJob = $classJob->addNewJob($title, $sub_title, $job_description, $job_image, $limit_date, $status);
}

if (isset($_POST['edit_new_banner'])) {

    $title = $_POST['job_title'];
    $subtitle = $_POST['job_subtitle'];
    $job_description = $_POST['job_description'];
    $id = $_POST['job_id'];

    $limit_date = $_POST['limit_date'];
    $limit_date = explode('-',$limit_date);
    $limit_date = $limit_date[2].'/'.$limit_date[1].'/'.$limit_date[0];

}

if ($action === 'del_job') {

    $delete = $classJob->deleteJob($job_id);
}

if ($action === 'ed_stts') {

    $updateStatus = $classJob->UpdateStatus($job_id, $_GET['set_stts']);
}
