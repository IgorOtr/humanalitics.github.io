<?php

require "../classes/Banner.php";

$action = $_GET['action'];

if (isset($_POST['add_new_banner'])) {

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

if ($action == 'ed_stts') {

    if ($_GET['b_id']) {

        if ($_GET['set_stts']) {

            $class_banner = new Banner();
            $insert_banner = $class_banner->UpdateStatus($_GET['b_id'], $_GET['set_stts']); 

        } else {

            die("aqui");

            header('Location: http://localhost/Humanalitics/Admin/banner.php');
        } 

    } else {

        die("aqui");
    
        header('Location: http://localhost/Humanalitics/Admin/banner.php');
    } 
    
}

if ($action == 'del_ban') {

    if ($_GET['b_id']) {

        $class_banner = new Banner();
        $insert_banner = $class_banner->DeleteBanner($_GET['b_id']); 

    } else {

        header('Location: http://localhost/Humanalitics/Admin/banner.php');
    }

}