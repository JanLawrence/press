<style>
html body #sidebarContainer{
  display: none !important; /* hide PDF viewer toolbar */
}
html body #mainContainer .toolbar {
    display: none !important; /* hide PDF viewer toolbar */
}
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php if(!empty($publish)):?>
                        <?php if($publish[0]->active == 'yes'):?>
                            <embed src="<?=base_url($publish[0]->directory).'#toolbar=0'?>" type="application/pdf" width="100%" height="900px">
                        <?php else:?>
                            <div class="text-center">
                                <h4> No published newspaper found. </h4>
                            </div>
                        <?php endif;?>
                    <?php else:?>
                        <div class="text-center">
                            <h4> No published newspaper found. </h4>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>