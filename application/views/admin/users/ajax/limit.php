<?php 
    $permission = array('Add', 'Edit', 'Delete'); 
?>
<hr>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">User:</label>
    <div class="col-sm-10">
        <?php foreach($user as $key => $each): ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="module_id[]" value="<?=$each->id?>" <?= $each->limits == 'yes' ? 'checked' : ''?>>
            <label class="form-check-label"><?= $permission[$key]?></label>
        </div>
        <?php endforeach;?>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Publish:</label>
    <div class="col-sm-10">
        <?php foreach($publish as $key => $each): ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="module_id[]" value="<?=$each->id?>" <?= $each->limits == 'yes' ? 'checked' : ''?>>
            <label class="form-check-label">Publish</label>
        </div>
        <?php endforeach;?>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Notification:</label>
    <div class="col-sm-10">
        <?php foreach($notif as $key => $each): ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="module_id[]" value="<?=$each->id?>" <?= $each->limits == 'yes' ? 'checked' : ''?>>
            <label class="form-check-label"><?= $permission[$key]?></label>
        </div>
        <?php endforeach;?>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Mission/Vision:</label>
    <div class="col-sm-10">
        <?php foreach($mission as $key => $each): ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="module_id[]" value="<?=$each->id?>" <?= $each->limits == 'yes' ? 'checked' : ''?>>
            <label class="form-check-label">Edit</label>
        </div>
        <?php endforeach;?>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Faculty:</label>
    <div class="col-sm-10">
        <?php foreach($faculty as $key => $each): ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="module_id[]" value="<?=$each->id?>" <?= $each->limits == 'yes' ? 'checked' : ''?>>
            <label class="form-check-label"><?= $permission[$key]?></label>
        </div>
        <?php endforeach;?>
    </div>
</div><hr>
<div class="form-group text-right">
    <button class="btn btn-info" type="submit">Save</button>
</div>