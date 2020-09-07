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
                        <form class="form" action="<?=base_url();?>admin/save_quotes" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="quote_id" value="<?=@$quotes_data->quote_id?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Select Customer *</label>
                                              <select class="form-control" name="customer_id" required>
                                               <option  disabled hidden selected> -- Select Customer -- </option>
                                               <?php foreach($customerdata as $customer){ ?>
                                               <?php
                                                 $selected = "";
                                                 if(@$quotes_data->customer_id == $customer->customer_id){
                                                   $selected = "selected";
                                                 }
                                                   ?>
                                                 <option value="<?=@$customer->customer_id?>" <?=$selected?>><?=@$customer->first_name.' '.$customer->last_name ?></option>
                                               <?php } ?>
                                           </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Select Property *</label>
                                            <select class="form-control" name="property_id" required>
                                             <option  disabled hidden selected> -- Select Property -- </option>
                                             <?php foreach($propertiesdata as $properties){ ?>
                                             <?php
                                               $selected = "";
                                               if(@$quotes_data->property_id == $properties->id){
                                                 $selected = "selected";
                                               }
                                                 ?>
                                               <option value="<?=$properties->id?>" <?=$selected?>><?=$properties->name ?></option>
                                             <?php } ?>
                                         </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Total Amount *</label>
                                            <input type="number" class="form-control" placeholder="enter total amount" required name="total_amount" value="<?=@$quotes_data->total_amount?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Payment Method *</label>
                                            <select class="form-control" name="payment_method">
                                              <option <?php if(@$quotes_data->payment_method==null){ echo "selected"; }?> hidden disabled>--Select--</option>
                                              <option value="check" <?php if(@$quotes_data->payment_method=="check"){ echo "selected"; }?>>Check</option>
                                              <option value="cash" <?php if(@$quotes_data->payment_method=="cash"){ echo "selected"; }?>>Cash</option>
                                              <option value="online" <?php if(@$quotes_data->payment_method=="online"){ echo "selected"; }?>>Online</option>
                                            </select>
                                        </fieldset>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">notes *</label>
                                            <textarea name="notes" class="form-control" placeholder="enter notes" rows="8" cols="80">
                                              <?=@$quotes_data->notes?>
                                            </textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                      <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-body">
                                          <div class="card-block">
                                            <div class="item_row">

                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label>Date *</label>
                                                    <input class="form-control" type="date" name="payment_date[]" value="<?=@$record_more[0]['payment_date']?>" required>
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label>Amount *</label>
                                                    <input class="form-control" type="number" name="amount[]" value="<?=@$record_more[0]['amount']?>" required>
                                                  </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-group">
                                                    <label>Status *</label>
                                                    <select class="form-control" name="status[]">
                                                      <option <?php if(@$record_more[0]['status']==null){ echo "selected"; }?> hidden disabled>--Select--</option>
                                                      <option value="upcoming" <?php if(@$record_more[0]['status']=="upcoming"){ echo "selected"; }?>>upcoming</option>
                                                      <option value="due" <?php if(@$record_more[0]['status']=="due"){ echo "selected"; }?>>due</option>
                                                      <option value="paid" <?php if(@$record_more[0]['status']=="paid"){ echo "selected"; }?>>paid</option>
                                                    </select>
                                                  </div>
                                                </div>
                                              </div>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                </div>
                                <div class="row">
                                  <div class="col-xl-12 col-md-12">
                                  <div class="addmore_items">
                                      <?php
                                       if(@count($record_more)>1){
                                        for($er=1;$er<@count($record_more);$er++){
                                           ?>
                                          <div class="row moremain_row<?=@$record_more[$er]['payment_id']?>">
                                            <div class="col-sm-12">
                                              <div class="card">
                                                <div class="card-header">
                                                </div>
                                                <div class="card-body">
                                                  <div class="card-block">
                                                    <div class="item_row">
                                                      <div class="row">
                                                          <div class="col-md-12">
                                                              <a title="Remove item" class="btn-link btn-sm removemmore_btn  float-right" data="<?=@$record_more[$er]['payment_id']?>"><i class="fa fa-minus"></i> Remove</a>
                                                          </div>
                                                      </div>
                                                      <div class="row">
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                            <label>Date *</label>
                                                            <input class="form-control" type="date" name="payment_date[]" value="<?=@$record_more[$er]['payment_date']?>" required>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                            <label>Amount *</label>
                                                            <input class="form-control" type="number" name="amount[]" value="<?=@$record_more[$er]['amount']?>" required>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-group">
                                                            <label>Status *</label>
                                                            <select class="form-control" name="status[]">
                                                              <option <?php if(@$record_more[$er]['status']==null){ echo "selected"; }?> hidden disabled>--Select--</option>
                                                              <option value="upcoming" <?php if(@$record_more[$er]['status']=="upcoming"){ echo "selected"; }?>>upcoming</option>
                                                              <option value="due" <?php if(@$record_more[$er]['status']=="due"){ echo "selected"; }?>>due</option>
                                                              <option value="paid" <?php if(@$record_more[$er]['status']=="paid"){ echo "selected"; }?>>paid</option>
                                                            </select>
                                                          </div>
                                                        </div>
                                                      </div>

                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      <?php
                                    }
                                    }
                                    ?>
                                  </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card">
                                      <div class="card-header">
                                      </div>
                                      <div class="card-body">
                                        <div class="card-block">
                                          <a title="Addmore item" class="btn btn-default  float-right addmore_btn"><i class="fa fa-plus"></i> Addmore</a>
                                        </div>
                                      </div>
                                    </div>
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
    <!-- </div> -->
<script type="text/javascript" language="javascript">

        var sno=1;
        $('.addmore_btn').click(function(){
            sno++;
            var addmorerow='<div class="row moremain_row'+sno+'">'+
              '<div class="col-sm-12">'+
                '<div class="card">'+
                  '<div class="card-header">'+
                  '</div>'+
                  '<div class="card-body">'+
                    '<div class="card-block">'+
                      '<div class="item_row">'+
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<a title="Remove item" class="btn-link btn-sm removemmore_btn  float-right" data="'+sno+'"><i class="fa fa-minus"></i> Remove</a>'+
                            '</div>'+
                        '</div>'+
                        '<div class="row">'+
                          '<div class="col-md-4">'+
                            '<div class="form-group">'+
                              '<label>Date *</label>'+
                              '<input class="form-control" type="date" name="payment_date[]" value="<?=@$record_more['payment_date']?>" required>'+
                            '</div>'+
                          '</div>'+
                          '<div class="col-md-4">'+
                            '<div class="form-group">'+
                              '<label>Amount *</label>'+
                              '<input class="form-control" type="number" name="amount[]" value="<?=@$record_more['amount']?>" required>'+
                            '</div>'+
                          '</div>'+
                          '<div class="col-md-4">'+
                            '<div class="form-group">'+
                              '<label>Status *</label>'+
                              '<select class="form-control" name="status[]">'+
                                '<option <?php if(@$record_more["status"]==null){ echo "selected"; }?> hidden disabled>--Select--</option>'+
                                '<option value="upcoming" <?php if(@$record_more["status"]=="upcoming"){ echo "selected"; }?>>upcoming</option>'+
                                '<option value="due" <?php if(@$record_more["status"]=="due"){ echo "selected"; }?>>due</option>'+
                                '<option value="paid" <?php if(@$record_more["status"]=="paid"){ echo "selected"; }?>>paid</option>'+
                              '</select>'+
                            '</div>'+
                          '</div>'+
                        '</div>'+

                      '</div>'+
                    '</div>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div>';
            $('.addmore_items').append(addmorerow);
            $('.removemmore_btn').click(function(){
               var rowid=$(this).attr('data');
               $('.moremain_row'+rowid).remove();
            });
        });
        $('.removemmore_btn').click(function(){
               var rowid=$(this).attr('data');
               $('.moremain_row'+rowid).remove();
        });
    </script>
