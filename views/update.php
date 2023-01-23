<?php
if (isset($_POST['id'])) {
    $existingArticle = new ArticleController();
    $article = $existingArticle->getOneArticle();
    
} else {
    Redirect::to('home');
}

if (isset($_POST['submit'])) {
    $existingArticle = new ArticleController();
    $existingArticle->updateArticle();
}

?>

<div class="container  ">
    <div class="row my-4 ">
        <div class="card bg-info">
            <div class="card-body bg-light">
                <div class="mb-3 text-center">
                    <h4>UPDATE ARTICLE </h4>
                </div>
                <a href="<?php echo BASE_URL; ?>dashboard" class="btn btn-sm btn-primary mr-2 mb-2">
                    <i class="fa fa-home"></i>
                </a>
                <form method="post" action="?" data-parsley-validate>
                    <input type="hidden" name="id" value="<?php echo $article->article_id; ?>">
                    <div class="form-group mt-3">
                        <label for="Fullname"> title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $article->title; ?>" placeholder="title" required data-parsley-trigger="keyup">
                    </div>
                    <div class="form-group mt-3">
                        <label for="matrucule"> content</label>
                        <textarea type="text" name="content" class="form-control" placeholder="content" required data-parsley-trigger="keyup"><?php echo $article->content; ?></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <label for="departement">author </label>
                        <input type="text" name="author" class="form-control" value="<?php echo $article->author ?>" placeholder="authore" required data-parsley-trigger="keyup">
                    </div>
                    <div class="form-group mt-3">
                        <label class="input-group" for="category">category</label>
                        <select class="form-select" id="category" name="category" required data-parsley-trigger="keyup">
                            <?php $selected =  $article->category_id; ?>
                            <option disabled>categorie</option>
                            <option value="1" <?php if ($selected == '1') echo 'selected'; ?>>Devoloppment</option>
                            <option value="2" <?php if ($selected == '2') echo 'selected'; ?>>Big data</option>
                            <option value="3" <?php if ($selected == '3') echo 'selected';  ?>>devops</option>

                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="date"> date </label>
                        <input type="date" name="date_created" class="form-control" value="<?php echo $article->date_created; ?>" placeholder="date" required data-parsley-trigger="keyup">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-3" name="submit">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>