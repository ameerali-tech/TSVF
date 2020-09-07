<div class="main-content">
          <div class="content-wrapper"><!-- Basic Elements start -->
<section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"><?=$title;?></h4>
                </div>
                <div class="card-body">
                    <div class="px-3">
                        <form class="form" action="<?=base_url();?>Properties/save_properties" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="item_id" value="<?=@$form_data->id?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Name *</label>
                                            <input type="text" class="form-control" placeholder="enter name" required="" value="<?=@$form_data->name?>" name="name">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-4mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Lot Size *</label>
                                            <input type="number" class="form-control" placeholder="enter Size" required="" name="lot_size" value="<?=@$form_data->lot_size?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-4mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Amount / Square meter *</label>
                                            <input type="number" class="form-control" placeholder="enter Amount Per Square Meter" required="" name="amountpersquaremeter" value="<?=@$form_data->amountpersquaremeter?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-4mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Cost *</label>
                                            <input type="number" class="form-control" placeholder="enter cost" required="" name="cost" value="<?=@$form_data->cost?>">
                                        </fieldset>
                                    </div>

                                    <div class="col-xl-6 col-lg-4mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">SKU *</label>
                                          <input type="text" class="form-control" placeholder="enter sku" required="" name="sku" value="<?=@$form_data->sku?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-4mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Payment Terms *</label>
                                            <select class="form-control" name="payment_term" placeholder="Select Payment Terms">
                                              <option value="Down Payment">Down Payment</option>
                                              <option value="Interest Per Annum">Interest Per Annum</option>
                                              <option value="Months of Paymen">Months of Payment </option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-actions">
                                <button type="Submit" class="btn btn-raised btn-primary"><i class="ft-check position-right"></i> Save</button>
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
