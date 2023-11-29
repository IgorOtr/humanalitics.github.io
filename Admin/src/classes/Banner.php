<?php
session_start();

class Banner{

    public function GetAllBanners()
    {
        require '../db/connect.php';

        echo 'GET ALL';
    }

    public function UploadBannerToFolder()
    {
        echo "Banner Uploaded";
    }

    public function InsertBanner()
    {
        echo "Banner Created";
    }
    
}