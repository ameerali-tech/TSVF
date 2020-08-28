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
                        <form class="form" action="<?=base_url();?>reports/new_report" method="post">
                            <div class="form-body">
                                <div class="row">
                                  <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                      <label for="basicInput">From Date *</label>
                                      <input type="date" class="form-control" required name="from_date">
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                    <fieldset class="form-group">
                                      <label for="basicInput">To Date *</label>
                                      <input type="date" class="form-control" required name="to_date">
                                    </fieldset>
                                  </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Item</label>
                                            <select class="form-control" name="item_id">
                                                <option value="all">All</option>
                                                <?php foreach ($items as $v) { ?>
                                                 <option value="<?=$v->id?>" data="<?=$v->item_qty?>"><?=$v->name?></option>
                                               <?php    } ?>
                                            </select>
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
