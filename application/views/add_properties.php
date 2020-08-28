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
                                            <label for="basicInput">Size *</label>
                                            <input type="number" class="form-control" placeholder="enter Size" required="" name="size" value="<?=@$form_data->size?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-4mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Color *</label>
                                            <input type="text" class="form-control" placeholder="enter color" required="" name="color" value="<?=@$form_data->color?>">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-6 col-lg-4mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Weight *</label>
                                            <input type="number" class="form-control" placeholder="enter weight" required="" name="weight" value="<?=@$form_data->weight?>">
                                        </fieldset>
                                    </div>

                                    <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Notes </label>
                                            <textarea class="form-control" placeholder="enter notes" rows="6" required=""  name="notes"><?=@$form_data->notes?></textarea>
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
