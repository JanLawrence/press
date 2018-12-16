<div class="container">
    <!-- Article Type -->
    <h3 class="my-4"><strong><?= $articleType?></strong></h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="stories-box">
                <?php if(!empty($articles)): ?>
                <?php foreach($articles as $each){?>
                    <div class="story-card">
                        <h5><?= $each->title?></h5>
                        <p><?= $each->sub_article?></p>
                        <a class="btn btn-primary btn-sm" href="<?= base_url('article/view?id='.$each->id)?>" target="_blank"><i class="ti-search" artid="<?= $each->id?>"></i> View</a>
                    </div>
                <?php } ?>
                <?php else:?>
                    <div class="story-card">
                        <h5>No articles found.</h5>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>