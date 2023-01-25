<?php

if (isset($_POST['ok'])) {
    $newArticle = new ArticleController();
    $newArticle->addArticle();
}

?>
<style>
.image-upload>input {
  display: none;
}
</style>

<div class="container  ">
    <div class="row my-4 ">

        <div class="card bg-info">

            <div class="card-body bg-light">
                <div class="mb-3 text-center">
                    <h4>ADD ARTICLE </h4>
                </div>
                <a href="<?php echo BASE_URL; ?>dashboard" class="btn btn-sm btn-primary mr-2 mb-2">
                    <i class="fa fa-home"></i>
                </a>

                <form method="post" action="?" id="original-form" enctype="multipart/form-data" data-parsley-validate>

                    <section id="section">
                        <div id="forms" class="card bg-white m-2 p-3">
                            <a type="button float-right" id="cross" class="btn-close" aria-label="Close" onclick="remove();"></a>
                            <div class="form-group mt-3">
                                <label for="Fullname"> title</label>
                                <input type="text" name="title[]" class="form-control" placeholder="title" required data-parsley-trigger="keyup">
                            </div>
                            <div class="form-group mt-3">
                                <label for="matrucule"> content</label>
                                <textarea type="text" name="content[]" class="form-control" placeholder="content" required data-parsley-trigger="keyup"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="departement">author </label>
                                <input type="text" name="author[]" class="form-control" placeholder="authore" required data-parsley-trigger="keyup">
                            </div>

                            <div class="form-group mt-3">
                                <label class="input-group" for="category">Options</label>
                                <select class="form-select" id="category" name="category[]" required data-parsley-trigger="keyup">
                                    <option disabled selected>categorie</option>
                                    <option value="1">Devoloppment</option>
                                    <option value="2">Big data</option>
                                    <option value="3">devops</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="date"> date </label>
                                <input id="f1" type="date" name="date_created[]" class="form-control" placeholder="date" required data-parsley-trigger="keyup">
                            </div>
                            <div class="form-group mt-3">
                                <input type="hidden" name="admin[]" class="form-control" value="<?= $_SESSION['id']; ?>">
                            </div>
                            <div class=" image-upload">
                            <label for="file-input">
                                <img src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png" width="50px" height="50px"/>
                            </label>
                            <input id="file-input" type="file" name="image[]" />
                        </div>
                        </div>
                     
                    </section>

                    <button type="submit" name="ok" class="btn btn-primary mt-3">Valider</button>
                    <button type="button" id="duplicate-form" class="btn btn-primary mt-3">duplecate</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script src="views\app.js"></script>