<div class="container">
    <!-- Article Type -->
    <!-- <div class="row">
        <div class="col-lg-12">
            <h3 class="my-4"><strong>Headline</strong></h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="stories-box">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card" style="width:340px">
                                    <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:40%">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title text-center">John Doe</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="width:340px">
                                    <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:40%">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title text-center">John Doe</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card" style="width:340px">
                                    <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:40%">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title text-center">John Doe</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <?php 
            $ci =&get_instance();
            $ci->load->model('article_model');
        ?>
        <?php foreach($article_type as $type): ?>
        <div class="col-lg-12">
            <h3 class="my-4"><strong><?= $type->type?></strong></h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="stories-box">
                        <div class="row">
                            <?php 
                                $aview= isset($_GET['aview']) ? $_GET['aview'] : '';  
                                $article = $ci->article_model->getArticlesPerType($type->id, $aview); ?>
                            <?php foreach($article as $each): ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="data:image/<?= $each->image_type?>;base64, <?= base64_encode($each->image_content) ?>" alt="Card image" style="width:40%">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $each->title?></h4>
                                            <p class="card-text"><?= $each->sub_article.'...'?></p>
                                            <a target="_blank" href="<?= base_url('article/view?id='.$each->id)?>" class="btn btn-primary btn-sm">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <div class="col-md-12 text-center mt-3">
                                <?php if(count($article) >= 3):?>
                                    <?php if($type->id != $aview):?>
                                    <a href="<?= base_url('article/articles?aview='.$type->id)?>" class="btn btn-primary btn-sm">View All</a>
                                    <?php endif;?>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>