<div class="row">
    <div class="col-md-12">
        <form id="addForm" method="post">
            <div class="card rounded-0">
                <div class="card-body">
                    <label>COE</label>
                    <div class="form-group"> 
                        <label>Mission: </label>
                        <textarea class="form-control" type="text" name="mission" required><?= isset($coe[0]->mission) ? $coe[0]->mission : ''?></textarea>
                    </div>    
                    <div class="form-group">
                        <label>Vision: </label>
                        <textarea class="form-control" type="text" name="vision" required><?= isset($coe[0]->vision) ? $coe[0]->vision : ''?></textarea>
                    </div>    
                    <div class="form-group">
                        <label>EVSU CORE VALUES: </label>
                        <textarea class="form-control" type="text" name="core_values" required><?= isset($coe[0]->core_values) ? $coe[0]->core_values : ''?></textarea>
                    </div>    
                    <div class="form-group">
                        <label>EVSU PALANTAW TINGUHA: </label>
                        <textarea class="form-control" type="text" name="palantaw_tinguha" required><?= isset($coe[0]->palantaw_tinguha) ? $coe[0]->palantaw_tinguha : ''?></textarea>
                    </div>    
                    <div class="form-group">
                        <label>OBJECTIVES: </label>
                        <textarea class="form-control" type="text" name="objectives" required><?= isset($coe[0]->objectives) ? $coe[0]->objectives : ''?></textarea>
                    </div>    
                    <div class="form-group">
                        <label>PROGRAM MISSION: </label>
                        <textarea class="form-control" type="text" name="program_mission" required><?= isset($coe[0]->program_mission) ? $coe[0]->program_mission : ''?></textarea>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-info" type="submit"><i class="ti-save"></i> SAVE</button> 
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Point to external Javascript file -->
<script src="<?= base_url()?>assets/modules/js/admin/coe.js"></script>