<?php

require "../classes/Banner.php";

if (isset($_POST['add_new_banner'])) {

    // echo '<pre>';
    // var_dump($_POST);
    // echo '<pre>';

    // echo '<pre>';
    // var_dump($_FILES['banner_file']);
    // echo '<pre>';

    $title = $_POST['banner_title'];
    $sub_title = $_POST['banner_sub_title'];
    $text = $_POST['banner_text'];
    $link = $_POST['banner_link'];
    $img = $_FILES['banner_file'];
    $status = 'ativo';
    $created_at = date('d/m/Y');

    $class_banner = new Banner();
    $insert_banner = $class_banner->InsertBanner($title, $sub_title, $text, $link, $img, $status, $created_at); 
}