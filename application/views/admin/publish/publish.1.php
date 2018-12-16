<style>
    div.file {
        position: relative;
        overflow: hidden;
    }
    input[type=file]{
        position: absolute;
        font-size: 50px;
        opacity: 0;
        right: 0;
        top: 0;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-0">
            <div class="card-body text-center">
                <form id="publishForm" method="post" enctype="multipart/form-data">
                    <?php if(empty($publish)):?> 
                        <div class="form-group mt-5">
                            <h3>Click the button below to upload the latest newspaper to be seen</h3>
                        </div>
                        <div class="form-group mb-5">
                            <div class="file btn btn-lg btn-info">
                                <i class="ti-upload"></i> <label class="m-0"> Upload</label>
                                <input type="file" name="file"/>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group mt-5">
                            <h3>If you have already chosen a file, click the button below.</h3>
                        </div>
                        <div class="form-group mb-5">
                            <button type="submit" atr-type="publish" class="btn btn-info btn-lg"><i class="ti-save"></i> Publish</button>
                        </div>
                    <?php else:?>
                        <?php if($publish[0]->active == 'yes'):?>
                            <div class="form-group mt-5">
                                <h3>You have already published a newspaper</h3>
                            </div>
                            <div class="form-group mb-5">
                                <a download href="<?=base_url($publish[0]->directory)?>" class="btn btn-info btn-lg"><i class="ti-download"></i> Download</a>
                                <input type="hidden" name="id" value="<?= $publish[0]->id?>"/>
                            </div>
                            <hr>
                            <div class="form-group mt-5">
                                <h3>If you want to replace the existing newspaper, click the button below.</h3>
                            </div>
                            <div class="form-group mb-5">
                                <button type="submit" atr-type="replace" class="btn btn-info btn-lg"><i class="ti-reload"></i> Replace</button>
                            </div>
                        <?php else:?>
                            <div class="form-group mt-5">
                                <h3>Click the button below to upload the latest newspaper to be seen</h3>
                            </div>
                            <div class="form-group mb-5">
                                <div class="file btn btn-lg btn-info">
                                    <i class="ti-upload"></i> <label class="m-0"> Upload</label>
                                    <input type="file" name="file"/>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group mt-5">
                                <h3>If you have already chosen a file, click the button below.</h3>
                            </div>
                            <div class="form-group mb-5">
                                <button type="submit" atr-type="publish" class="btn btn-info btn-lg"><i class="ti-save"></i> Publish</button>
                            </div>
                        <?php endif;?>
                    <?php endif;?>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url()?>assets/modules/js/admin/publish.js"></script>