<?php
include '../Admin/src/classes/Blog.php';

$blog_class = new Blog();
$posts = $blog_class->GetAllPostsToBlog();

include '../includes/head.php';
?>

<body>
    <div class="hero_area">
        <?php include '../includes/navbar.php';?>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="p-5" style="color: #1c1c1c;">Blog</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col">
                            <h5>Todos os Posts</h5>
                        </div>
                    </div>
                    <div class="row">

                        <?php for ($i = 0; $i < count($posts); $i++){?>

                        <div class="col-md-12 mb-5 mt-3">
                            <a href="<?php echo SITE_URL.'Blog/post.php?id='.$posts[$i]['id']?>" class="card-link">
                                <div class="card mb-3">
                                    <img src="<?php echo SITE_URL.'Admin/public/img/post/'.$posts[$i]['post_image']?>"
                                        class="card-img-top">
                                    <div class="card-body">  
                                        <h5 class="card-title" style="color: #FEBE00;">
                                            <?php echo $posts[$i]['post_title']?></h5>
                                        <p class="card-content">
                                            <?php echo substr(strip_tags($posts[$i]['post_content']),0,200).'... <span style="color: #FEBE00;">Clique e saiba mais</span>'?>
                                        </p>
                                        <p class="card-text"><small class="text-muted">Publicado em:
                                                <?php echo $posts[$i]['created_at']?></small>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php }?>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col">
                            <h5>Posts em Destaque</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <a href="" class="card-link">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="http://localhost/Humanalitics/Admin/public/img/post/blog_170197741465721d4644561.png" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>


        <?php include '../includes/footer.php';?>
</body>

</html>