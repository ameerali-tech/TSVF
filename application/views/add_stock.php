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
                        <form class="form" action="<?=base_url();?>items/save_stock" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?=@$user_data->id?>">
                            <div class="form-body">
                                <div class="row">
                                  <?php if($this->session->userdata('user_type') == "admin") { ?>
                                      <div class="col-xl-12 mb-1">
                                          <fieldset class="form-group">
                                              <label for="basicInput">Shops *</label>
                                              <select class="form-control" required="" name="warehouse">
                                                  <option value="">select</option>
                                              <?php foreach ($warehouse_data as $value) { ?>
                                                   <option value="<?=hashids_encrypt($value->id)?>" <?=(@$user_data->warehouse_id == $value->id) ? 'selected' : ''?>><?=$value->warehouse_name?></option>
                                              <?php    } ?>
                                              </select>
                                          </fieldset>
                                      </div>
                                    <?php } ?>
                                    <div class="col-xl-6 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Item *</label>
                                            <select class="form-control" required="" name="item_id">
                                                <option value="">select</option>
                                            <?php foreach ($item_data as $value) { ?>
                                                 <option value="<?=hashids_encrypt($value->id)?>" <?=(@$user_data->role_id == $value->id) ? 'selected' : ''?>><?=$value->name?></option>
                                            <?php    } ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Qty *</label>
                                            <input type="text" class="form-control" placeholder="enter qty" required="" value="<?=@$user_data->first_name?>" name="qty">
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-actions">
                                  <button type="Submit" class="btn btn-raised btn-primary"><i class="ft-plus"></i> Add Stock</button>
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
