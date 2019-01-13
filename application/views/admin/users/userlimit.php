<!-- List of Users -->
<div class="row">
    <div class="col-md-12">
        <div class="card rounded-0">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h3 class="card-title">User Limitation</h3>
                    </div>
                    <div class="float-right">
                        <!-- <a href="#" class="btn btn-secondary btn-sm mb-4 btn-add"><i class="ti-plus"></i> Add User</a> -->
                    </div>
                </div>
                <hr>
                <form id="saveLimitation" method="post">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Admin User</label>
                        <div class="col-sm-10">
                            <select name="user" class="form-control selectpicker" data-live-search="true">
                                    <option selected value="" disabled>Select Admin User</option>
                                <?php foreach($users as $each): ?>
                                    <option value="<?=$each->id?>"><?= $each->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="returnLimitations">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('select[name="user"]').change(function(){
            var user = $(this).val();
            $.post(URL + 'admin/returnLimit', {'user': user})
            .done(function(returnData){
                $('.returnLimitations').html(returnData);
            })
        })
        $('#saveLimitation').submit(function(){
            var form = $(this).serialize();
            if(confirm("Are you sure you want to save the changes you've made?")){
                $.post(URL + 'admin/saveUserlimit', form)
                .done(function(returnData){
                    alert('Changes successfully saved');
                })
                return false;
            } else {
                return false;
            }
        })
    })
</script>
