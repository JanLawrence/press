<?php
    $userSession = $this->session->userdata['user'];
    $userInfo = $this->db->get_where('tbl_user_info', array('user_id' => $userSession->id));
    $userInfo = $userInfo->result();
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h6>Manage Accounts</h6>
					<form method="post" id="accountForm">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">First Name:</label>
							<div class="col-sm-9">
								<input type="hidden" class="form-control" name="id" value="<?= $userInfo[0]->user_id?>">
								<input type="text" class="form-control" name="firstName" value="<?= $userInfo[0]->fname?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Middle Name:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="middleName" value="<?= $userInfo[0]->mname?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Last Name:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="lastName" value="<?= $userInfo[0]->lname?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Contact No.:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="phone" value="<?= $userInfo[0]->contact_no?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Email:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="email" value="<?= $userInfo[0]->email?>">
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" value="<?= $userSession->username?>">
                            </div>
                        </div>
                        <div class="form-group text-right">
						    <button type="submit" class="btn btn-info btn-flat">Submit</button>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    $(function(){
        $('#accountForm').submit(function(){
            var form = $(this).serialize();
			if(confirm('Are you sure you want to update your account?')){
				$.post(URL+'admin/manageaccounts', form)
				.done(function(returnData){
					if(returnData == 2){
						alert('Username exists');
					} else if(returnData == 3){
						alert('Email exists');
					} else {
						alert('Account successfully updated')
						location.reload();
					}
				})
				return false;
			} else {
				return false;
			}
			return false;
        })
    })
</script>