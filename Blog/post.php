<?php
include '../Admin/src/classes/Blog.php';

$blog_class = new Blog();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$uniq_post = $blog_class->GetPostsFromId($id);

// var_dump($posts);
// die();

include '../includes/head.php';
?>

<body>
    <div class="hero_area">
        <?php include '../includes/navbar.php';?>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="p-5" style="color: #1c1c1c;">Blog</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-12">
                    <div class="row">

                        <?php for ($i = 0; $i < count($uniq_post); $i++){?>

                        <div class="col-md-12 mb-5 mt-3">
                            <a class="card-link">
                                <div class="mb-3">
                                    <h1 class="card-title mb-4" style="color: #FEBE00;">
                                        <?php echo $uniq_post[$i]['post_title']?></h1>
                                    <img src="<?php echo SITE_URL.'Admin/public/img/post/'.$uniq_post[$i]['post_image']?>"
                                        class="card-img-top">
                                    <p class="card-text"><small class="text-muted">Publicado em:
                                            <?php echo $uniq_post[$i]['created_at']?></small>
                                    </p>
                                    <div class="card-body">
                                        <p class="card-content">
                                            <?php echo $uniq_post[$i]['post_content']?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php }?>

                    </div>
                </div>
            </div>
        </div>


        <?php include '../includes/footer.php';?>
</body>

</html>