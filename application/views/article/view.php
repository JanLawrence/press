<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-lg-11 mx-auto">
            <h1 class="text-center"><?= $article[0]->title?></h1><br>
            <h6 class="text-center">By: <?= $article[0]->NAME?></h6> <br> <br> <br>
            <div class="col-lg-6 offset-3 text-center">
                <img src="data:image/<?= $article[0]->image_type?>;base64, <?= base64_encode($article[0]->image_content) ?>" style="width:500px;">
            </div>
            <br><br>
            <div>
                <?= $article[0]->article?>
            </div>
        </div>
    </div>  
</div>