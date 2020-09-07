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
                        <form class="form" action="<?=base_url();?>Supplier/save_supplier" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?=@$user_data->supplier_id?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Supplier Name *</label>
                                            <input type="text" class="form-control" placeholder="enter supplier name" required="" value="<?=@$user_data->supplier_name?>" name="supplier_name">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Payment Method *</label>
                                            <select class="form-control" required="" name="payment_method">
                                                <option value="">select</option>
                                                <option value="Online Transfer" <?=(@$user_data->warehouse_id == 'Online Transfer') ? 'selected' : ''?>>Online Transfer</option>
                                                <option value="Trade Assurance" <?=(@$user_data->warehouse_id == 'Trade Assurance') ? 'selected' : ''?>>Trade Assurance</option>
                                                <option value="TT" <?=(@$user_data->warehouse_id == 'TT') ? 'selected' : ''?>>TT</option>
                                                <option value="Manually" <?=(@$user_data->warehouse_id == 'Manually') ? 'selected' : ''?>>Manually</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Credit days *</label>
                                            <input type="text" class="form-control" placeholder="enter credit days" required="" name="credit_days" value="<?=@$user_data->credit_days?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Supplier Status *</label>
                                            <select class="form-control" required="" name="user_status">
                                                <option value="">select</option>
                                                <option value="active" <?=(@$user_data->user_status == 'active') ? 'selected' : ''?> >Active</option>
                                                <option value="inactive" <?=(@$user_data->user_status == 'inactive') ? 'selected' : ''?>>Inactive</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Contact Person *</label>
                                            <input type="text" class="form-control" placeholder="enter contact person" required="" name="contact_person" value="<?=@$user_data->contact_person?>">
                                        </fieldset>
                                    </div>

                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">City *</label>
                                            <input type="text" class="form-control" placeholder="enter city" required=""  name="city" value="<?=@$user_data->city?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Mobile Number *</label>
                                            <input type="text" class="form-control" placeholder="enter mobile number" required=""  name="mobile_num" value="<?=@$user_data->mobile_num?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Supplier Address *</label>
                                            <textarea class="form-control" placeholder="enter supplier address" required=""  name="address"><?=@$user_data->address?></textarea>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h4>Contact Person Info</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Person Name *</label>
                                            <input type="text" class="form-control" placeholder="enter person name" required="" value="<?=@$user_data->person_name?>" name="person_name">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Person Designation *</label>
                                            <input type="text" class="form-control" placeholder="enter person designation" required="" value="<?=@$user_data->person_designation?>" name="person_designation">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Person Number *</label>
                                            <input type="text" class="form-control" placeholder="enter person number" required="" value="<?=@$user_data->person_number?>" name="person_number">
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
