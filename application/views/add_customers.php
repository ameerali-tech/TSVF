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
                        <form class="form" action="<?=base_url();?>Users/save_customers" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?=@$user_data->customer_id?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">First Name *</label>
                                            <input type="text" class="form-control" placeholder="enter first name" required="" value="<?=@$user_data->first_name?>" name="first_name">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Last Name *</label>
                                            <input type="text" class="form-control" placeholder="enter last name" required="" value="<?=@$user_data->last_name?>" name="last_name">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Phone Number *</label>
                                            <input type="text" class="form-control" placeholder="enter phone number" required="" name="phone_number" value="<?=@$user_data->phone_number?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Email *</label>
                                            <input type="text" class="form-control" placeholder="enter email" required="" name="email" value="<?=@$user_data->email?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Status *</label>
                                            <select class="form-control" name="customer_status">
                                              <option <?php if(@$user_data->customer_status==null){ echo "selected"; }?> hidden disabled>--Select--</option>
                                              <option value="active" <?php if(@$user_data->customer_status=="active"){ echo "selected"; }?>>Active</option>
                                              <option value="inactive" <?php if(@$user_data->customer_status=="inactive"){ echo "selected"; }?>>InActice</option>
                                              <option value="blocked" <?php if(@$user_data->customer_status=="blocked"){ echo "selected"; }?>>Blocked</option>
                                            </select>
                                        </fieldset>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Address *</label>
                                            <textarea name="address" class="form-control" placeholder="enter Address" rows="8" cols="80">
                                              <?=@$user_data->address?>
                                            </textarea>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-actions">
                                <div class="text-right">
                                    <button type="Submit" class="btn btn-raised btn-primary">Save <i class="ft-check position-right"></i></button>
                                    <button type="reset" class="btn btn-raised btn-warning">Reset <i class="ft-refresh-cw position-right"></i></button>
                                </div>
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
