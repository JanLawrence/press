<?php 
    $month = array('January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'November', 'December');
    $year = array(
        '2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019');
?>
<style>
    .tab-pane{
        padding: 20px;
    }
</style>
<form id="publishPermit" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="card rounded-0">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <h5 class="card-title">Newspaper</h5>
                        </div>
                        <div class="float-right">
                           
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Month</label>
                                <select name="month" class="form-control">
                                    <?php foreach($month as $key=>$each): ?>
                                        <option value="<?= $key+1?>"><?= $each?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <select name="year" class="form-control">
                                    <?php foreach($year as $key=>$each): ?>
                                        <option value="<?= $each?>"><?= $each?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-append" type="button" style="margin-left: 5px;"><i class="ti-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="page1-tab" data-toggle="tab" href="#page1" role="tab" aria-controls="home" aria-selected="true">
                                Page 1
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="page1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="form-group">
                                <textarea name="content[]" class="ckeditor" rows="20"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>
<script>
    $(function(){
        var page = 1;
        $('.btn-append').click(function(){
            page++;
            var tab = '<li class="nav-item">'+
                           '<a class="nav-link" id="page'+page+'-tab" data-toggle="tab" href="#page'+page+'" role="tab" aria-selected="true">'+
                                'Page '+page+
                            '</a>'+
                        '</li>';
            $('#myTab').append(tab);
            
            var content = '<div class="tab-pane fade show" id="page'+page+'" role="tabpanel">'+
                            '<div class="form-group">'+
                                '<textarea name="content[]" class="ckeditor" id="ckpage'+page+'" rows="20"></textarea>'+
                            '</div>'+
                        '</div>';
            $('#myTabContent').append(content);
            CKEDITOR.replace( 'ckpage' + page );
        })
        $(document).on('submit', '#publishPermit', function(){
            var form = $(this).serialize();
            if(confirm("Are you sure you want to save this newspaper?")){

                $.post(URL + 'admin/saveNewspaper', form)
                .done(function(returnData){
                    alert('Newspaper Successfully saved');
                    location.href = URL + "admin/newspaper";
                })
                return false;
            } else {
                return false;
            }
        })
        // CKEDITOR.replaceClass = 'ckedit';
        // $('#publishPermit').submit(function(){
        //     var form = $(this).serialize();
        //     if(confirm('Are you sure you want to publish this information?')){
        //         $.post(URL+'admin/savePermit', form)
        //         .done(function(returnData){
        //             alert('Content successfully published.')
        //             location.reload();
        //         })
        //         return false;
        //     } else {
        //         return false;
        //     }
        // })
    })
</script>