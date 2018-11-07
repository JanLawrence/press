<div class="container">
    <!-- Article Type -->
    <h3 class="my-4"><strong><?= $articles[0]->type?></strong></h3>
    <div class="row">
        <div class="col-lg-12">
            <?php foreach($articles as $each){?>
                <div class="stories-box">
                    <div class="story-card">
                        <h5><?= $each->title?></h5>
                        <p><?= $each->sub_article?></p>
                        <a class="btn btn-primary btn-sm" href="#"><i class="ti-search" artid="<?= $each->id?>"></i> View</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>