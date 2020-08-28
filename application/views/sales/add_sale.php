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
                      <?php if($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?=$this->session->flashdata('success')?>
                        </div>
                      <?php } ?>
                        <form class="form" action="<?=base_url();?>sales/add_sale" method="post">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Item *</label>
                                            <select class="form-control" required name="item_id">
                                                <option value="">select</option>
                                                <?php foreach ($items as $v) { ?>
                                                 <option value="<?=$v->id?>" data="<?=$v->item_qty?>"><?=$v->name?></option>
                                               <?php    } ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Qty *</label>
                                            <input type="number" class="form-control" placeholder="enter qty" required name="qty">
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

<script type="text/javascript">
  $('select[name=item_id]').change(function(){
    var item_qty=$('select[name=item_id] option:selected').attr('data');
    if (item_qty=='' || item_qty=='undefined') {
      item_qty=0;
    }
    $('input[name=qty]').prop('max',item_qty);
  });
</script>
