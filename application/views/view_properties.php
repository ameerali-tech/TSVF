<style>
  .card .card-header {
    padding-bottom: 0px;
  }
  #orders th {
    font-weight: 500;
    font-size: 12px;
    padding: 8px;
  }
  #orders td {
    font-size: 11px;
    padding: 8px;
  }
  .dimg {
    max-width: 100px;
    max-height: 100px;
  }
  .custom-control{
    margin-left: 10px;
  }
  .input-group{
    margin-bottom: 0px!important;
  }
  .special_input {
    width: 150px;
    border: none;
    border-bottom: 1px solid #ccc;
  }
</style>
<div class="main-content">

  <div class="content-wrapper"><!--Statistics cards Starts-->

      <div class="row">

        <div class="col-sm-12">

          <div class="card">

            <div class="card-header">

              <h4 class="card-title"><?=$title?> </h4>
            </div> <br><br>

            <div class="card-body">

              <div class="card-block mcontainer">
                <?php if($this->session->flashdata('response') == 'success') { ?>
                  <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?=$this->session->flashdata('msg')?>
                  </div>
                <?php } ?>
                <table class="table table-striped table-bordered table-hover table-checkable order-column display" id="orders" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Lot Size</th>
                            <th>Amount/ Square Meter</th>
                            <th>Cost</th>
                            <th>SKU</th>
                            <th>payment_terms</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
                <div class="clearfix">
                </div>
              </div>

            </div>

          </div>

        </div>

      </div>

  </div>

</div>

</div>

<!-- Modal -->
<div class="modal fade" id="statusModal" tabindex="0" role="dialog" aria-labelledby="statusModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 900px; margin-left: -100px">
      <form class="" action="<?=site_url('admin/change_status')?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="statusModalTitle">Change Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="order_id" id="order_id">
          <select class="form-control status_order" name="status" required>
            <option> -- change status -- </option>
            <option value="incoming">Incoming</option>
            <option value="picked">Picked</option>
            <option value="received">Received</option>
            <option value="prepared">Prepared</option>
            <option value="packed">Packed</option>
            <option value="shipped">Shipped</option>
          </select>
          <div class="row item_god_bad mt-2">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- viewModal -->
<div class="modal fade" id="viewModal" tabindex="0" role="dialog" aria-labelledby="statusModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width: 1000px;">
        <div class="modal-header">
          <h5 class="modal-title" id="statusModalTitle">View Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body view_details_">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" language="javascript">
 $(document).ready(function(){
    let status = $('#status').val();
    $('#orders').DataTable({
      "processing" : true,
      "serverSide" : true,
      "ajax" : {
        url:"<?=site_url('Properties/getProperties')?>",
        type:"POST",
      },
      dom: 'lBfrtip',
      buttons: [{ extend: 'excel', text: 'Export to excel' }],
      "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    });
 });


</script>
