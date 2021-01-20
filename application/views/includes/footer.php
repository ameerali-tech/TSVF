</div>


<script>

$(document).ready( function () {
  $('.datatable').DataTable();

} );


</script>
<footer class="footer footer-static footer-light">

  <p class="clearfix text-muted text-sm-center px-2">Developed <i class="fa fa-heart text-danger"></i> by <a href="http://thesoftvision.com" target="_blank">The Soft Vision</a> Team </p>
</footer>

</div>


<!-- ////////////////////////////////////////////////////////////////////////////-->



<!-- BEGIN VENDOR JS-->



<script src="<?=base_url('app-assets/vendors/js/core/popper.min.js')?>" type="text/javascript"></script>

<script src="<?=base_url('app-assets/vendors/js/core/bootstrap.min.js')?>" type="text/javascript"></script>

<script src="<?=base_url('app-assets/vendors/js/perfect-scrollbar.jquery.min.js')?>" type="text/javascript"></script>

<script src="<?=base_url('app-assets/vendors/js/prism.min.js')?>" type="text/javascript"></script>

<script src="<?=base_url('app-assets/vendors/js/jquery.matchHeight-min.js')?>" type="text/javascript"></script>

<script src="<?=base_url('app-assets/vendors/js/screenfull.min.js')?>" type="text/javascript"></script>

<script src="<?=base_url('app-assets/vendors/js/pace/pace.min.js')?>" type="text/javascript"></script>

<!-- BEGIN VENDOR JS-->

<!-- BEGIN APEX JS-->

<script src="<?=base_url('app-assets/js/app-sidebar.js')?>" type="text/javascript"></script>

<script src="<?=base_url('app-assets/js/notification-sidebar.js')?>" type="text/javascript"></script>

<script src="<?=base_url('app-assets/js/customizer.js')?>" type="text/javascript"></script>

<!-- END APEX JS-->

<!-- BEGIN PAGE LEVEL JS-->

<script src="<?=base_url('app-assets/js/dashboard1.js')?>" type="text/javascript"></script>

<!-- END PAGE LEVEL JS-->
<?php if ($this->session->userdata('role') == "admin"): ?>
<script type="text/javascript">
	function getdta() {
		$.ajax({
	        url: "<?=base_url('Admin/get_graphs')?>",
	        type: "POST",
	        dataType: 'JSON',
	        success: function(res){ 
	          $('#shipped_qty').html(res.shipped_qty);
	          $('#inventory').html(res.inventory);
	          $('#incoming').html(res.incoming);
	          $('#active_customer').html(res.active_customer);
	          $('#inactive_customer').html(res.inactive_customer);
	        }
	    })
	}
	setInterval(getdta, 30000);
</script>
<?php endif ?>
</body>





</html>

