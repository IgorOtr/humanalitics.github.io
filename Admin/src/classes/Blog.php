<?php
session_start();

class Blog{

    public function GetAllPosts()
    {
        require '../db/connect.php';

        echo 'GET ALL';
    }

    public function UploadPostToFolder()
    {
        echo "Post Uploaded";
    }

    public function InsertPost()
    {
        echo "Post Created";
    }
    
}