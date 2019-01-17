<form id="publishContactUs" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-0">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <h3 class="card-title">About Us/Contact Us</h3>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-info" type="submit">Publish</button>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea name="content" rows="10" class="form-control"><?= isset($contact[0]->content) ? $contact[0]->content : ''?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('#publishContactUs').submit(function(){
            var form = $(this).serialize();
            if(confirm('Are you sure you want to publish this information?')){
                $.post(URL+'admin/saveContactUs', form)
                .done(function(returnData){
                    alert('Content successfully published.')
                    location.reload();
                })
                return false;
            } else {
                return false;
            }
        })
    })
</script>