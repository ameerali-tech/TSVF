<div class="main-content">
          <div class="content-wrapper"><!-- Basic Elements start -->
<section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"><?=$title?></h4>
                </div>
                <div class="card-body">
                    <div class="px-3">
                        <form class="form" action="<?=base_url();?>admin/save_user" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?=@$user_data->id?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Username *</label>
                                            <input type="text" class="form-control" placeholder="enter username" required="" name="username" value="<?=@$user_data->username?>">
                                        </fieldset>
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">User Role</label>
                                              <select class="form-control" name="user_role_id" required>
                                                <option  value=""> -- Select User -- </option>
                                                <?php foreach($roles as $key => $value ){
                                                  $selected = "";
                                                  if(@$user_data->user_role_id == $value->role_id){
                                                    $selected = "selected";
                                                  }
                                                    ?>
                                                  <option value="<?php echo $value->role_id;?>" <?=$selected?>><?=$value->role_name?></option>
                                                <?php } ?>
                                              </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="basicInput">Password *</label>
                                          <input type="text" class="form-control" placeholder="enter password" required=""  name="password" value="<?=@$this->encryption->decrypt($user_data->password)?>">
                                        </fieldset>
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">First Name *</label>
                                            <input type="text" class="form-control" placeholder="enter first name" required="" value="<?=@$user_data->first_name?>" name="first_name">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Last Name *</label>
                                            <input type="text" class="form-control" placeholder="enter last name" required="" name="last_name" value="<?=@$user_data->first_name?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Phone Number *</label>
                                            <input type="text" class="form-control" placeholder="enter phone number" required="" name="ph_num" value="<?=@$user_data->email?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                          <label for="basicInput">Email *</label>
                                          <input type="text" class="form-control" placeholder="enter email" required="" name="email" value="<?=@$user_data->email?>">
                                        </fieldset>
                                    </div>

                                 </div>
                                <div class="form-actions">
                                  <button type="Submit" class="btn btn-raised btn-primary"><i class="ft-check"></i> Add User</button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

          </div>
        </div>
    </div>
