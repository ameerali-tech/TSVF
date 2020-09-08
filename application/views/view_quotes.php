<style>
  .card .card-header {
    padding-bottom: 0px;
  }
  #suppliers th {
    font-weight: 500;
    font-size: 12px;
    padding: 8px;
  }
  #suppliers td {
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
                <table class="table table-striped table-bordered table-hover table-checkable order-column display" id="quotes" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Customer Name</th>
                            <th>Property Name</th>
                            <th>Total Amount</th>
                            <th>Payment Method</th>
                            <th>Notes</th>
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

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="0" role="dialog" aria-labelledby="statusModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="statusModalTitle">View Payments</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th>Payment_id</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody class="view_payment_details_">
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- viewModal -->
<div class="modal fade" id="viewModal" tabindex="0" role="dialog" aria-labelledby="statusModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
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
    $('#quotes').DataTable({
      "processing" : true,
      "serverSide" : true,
      "ajax" : {
        url:"<?=site_url('Admin/getQuotes')?>",
        type:"POST"
      },
      dom: 'lBfrtip',
      buttons: [{ extend: 'excel', text: 'Export to excel' }],
      "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    });
 });

 function showViewModal(id){
   $('#viewModal').modal('show');

   $.ajax({
    url : '<?=site_url('admin/view_details_popup/')?>'+id,
    dataType : 'json',
    success :function(data) {
      $('.view_details_').html(data);
    }
   })
 }
 // Payment Modal
 function showPaymentModal(id){
   $('#paymentModal').modal('show');

   $.ajax({
    url : '<?=site_url('admin/view_payments_details/')?>'+id,
    dataType : 'json',
    success :function(data) {

      var html='';
      for (var i = 0; i < data.length; i++) {
        var badgecolor=" ";
        if (data[i].status=='upcoming') {
          badgecolor='success';
        }else if (data[i].status=='due') {
          badgecolor='danger';
        }
        html+='<tr>'+
        '<td>'+data[i].payment_id+'</td>'+
        '<td>'+data[i].payment_date+'</td>'+
        '<td>'+data[i].amount+'</td>'+
        '<td><span class="badge badge-'+badgecolor+'">'+data[i].status+'<span></td>'+

        '</tr>';
      }

      // console.log(data);
      $('.view_payment_details_').html(html);
    }
   })
 }
</script>
