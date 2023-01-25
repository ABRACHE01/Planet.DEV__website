<?php

if (isset($_POST['find'])) {
    $data = new ArticleController();
    $Articles = $data->findArticle();
} else if (isset($_POST['find'])) {
} else {
    $data = new ArticleController();
    $Articles = $data->getAllArticle();
}
include('views/includes/navbar.php');
?>
<div class="wrapper">

    <div class="title">
        <h1 class="text-center text-white logo">PLANET DEV</h1>
    </div>
    <div class="ms-5 me-5 d-flex justify-content-center ">
        <form action="?" method="POST" class="row domain-search bg-pblue pt-5 ">
            <div class="container">
                <div class="row ">
                    <div class="text-center">
                        <h2 class="form-title text-secondary h1 ">Find what you're <strong> Curious</strong> about</h2>
                        <h4 class="text-white pt-1">Search articles by category or title</h4>
                    </div>
                    <div>
                        <div class=" d-flex  justify-content-center">
                            <a href="<?php echo BASE_URL; ?>home" class=" btn btn-info  mr-2 text-secondary  ">
                                <i class="fa fa-home"></i>
                            </a>
                            <a href="<?php echo BASE_URL; ?>dashboard" class="btn btn-info mr-2  text-secondary ">
                                <i class="fa fa-dashboard"></i>
                            </a>

                        </div>

                        <div class="input-group p-4  ">
                            <input type="search" name="search" class="form-control form-control-lg text-center " placeholder="SEARCHE">
                            <select class="form-select" type="search" id="category" name="search">
                                <option disabled selected>SELECT BY CATEGORY</option>
                                <option value="devolopment">Devolopment</option>
                                <option value="Big data">Big data</option>
                                <option value="devops">Devops</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="find" class="btn btn-info mr-2 mt-2 text-white ">SEARCH</button>
        </form>

    </div>

    <?php foreach ($Articles as $Article) : ?>
        <div class="content">
            <div class="cardarticle first mt-5 ">
                <div class="mb-4">
                    <h1 class="text-center mb-4">⭐ <?php echo  $Article['title']; ?> ⭐</h1>
                    <img src="uploaded_images\<?php echo  $Article['image']; ?> " width="100%">
                </div>
                <div>
                    <p><strong>category : </strong> <?php echo  $Article['name']; ?></p>
                    <p><strong>Admin : </strong> <?php echo  $Article['fullname']; ?></p>
                    <p class="date"><strong>Date : </strong><?php echo  $Article['date_created']; ?></p>
                    <strong>Article</strong>
                    <p class="text">"<?php echo  $Article['content']; ?> "</p>
                    <p><strong>Autor : </strong> <?php echo  $Article['author']; ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<footer><div class="text-center p-5"> MADE with 💖 by <span class="text-secondary" > Mohamed ABRACHE </span></div></footer>