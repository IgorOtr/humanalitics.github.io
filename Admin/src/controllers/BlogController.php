<?php
require "../classes/Blog.php";

$classBlog = new Blog();


if (isset($_POST['new_post'])) {

    $title = $_POST['post_title'];
    $content = $_POST['post_content'];
    $image = $_FILES['post_image'];
    $status = 1;
    $created_at = date('d/m/Y');

    $create = $classBlog->InsertPost($title, $content, $image, $status, $created_at);
}