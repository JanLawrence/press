<div class="container-fluid">
    <!-- Article Type -->
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="my-4"><strong>Headline</strong></h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="stories-box">
                                <div class="row">
                                    <?php
                                        foreach($headline as $each):
                                    ?>
                                            <div class="col-md-6">
                                                <div class="card" style="width:340px">
                                                    <?php //if(!empty($each->image_type)): ?>
                                                        <img class="card-img-top" src="data:image/<?= $each->image_type?>;base64, <?= base64_encode($each->image_content) ?>" alt="<?= $each->title?>" style="width:100%; height:40%;">
                                                    <?php //endif;?>
                                                    <div class="card-img-overlay">
                                                        <h4 class="card-title text-center text-primary" style="margin-top:200px;"><?= $each->title?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        endforeach;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <div class="col-md-6">
                                            <div class="card">
                                                <img class="card-img-top" src="data:image/<?= $each->image_type?>;base64, <?= base64_encode($each->image_content) ?>" alt="Card image cap" style="height: 200px; width: 300px; margin: 0 auto; display: block;">
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
        <div class="col-lg-4">
            <div class="border p-3" style="height: 1000px; overflow-y: auto">        
                <h3 class="my-4"><strong>Announcements</strong></h3>
                <?php foreach($announcement as $each): ?>
                    <?php if($each->display == 'yes'): ?>
                    <div class="card mb-2">
                        <div class="card-body">
                            <h6 style="font-size: 9px; font-weight: 800;"><?= date('F d, Y', strtotime($each->date))?></h6>
                            <p style="font-size: 16px;"><?= $each->content?></p>
                        </div>
                    </div>
                    <?php endif;?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>