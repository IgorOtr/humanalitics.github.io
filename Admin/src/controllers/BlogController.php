<?php
require "../classes/Blog.php";

$classBlog = new Blog();
$action = isset($_GET['action']) ? $_GET['action'] : '';


if (isset($_POST['new_post'])) {

    $title = $_POST['post_title'];
    $content = $_POST['post_content'];
    $image = $_FILES['post_image'];
    $status = 'Ativo';
    $created_at = date('d/m/Y');

    $create = $classBlog->InsertPost($title, $content, $image, $status, $created_at);
}

if (isset($_POST['edit_post'])) {

    $title = $_POST['post_title'];
    $content = $_POST['post_content'];
    $updated_at = date('d/m/Y');
    $id = $_POST['post_id'];

    $create = $classBlog->UpdatePost($title, $content, $updated_at, $id);
}

if ($action == 'delete') {
    
    $id = $_GET['pid'];
    $img = $_GET['img'];
    
    $classBlog->DeletePost($id, $img);
}