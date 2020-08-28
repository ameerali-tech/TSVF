<div class="row">
	<div class="col-md-6">
		<h3>Item Details</h3> 
		<table class="table table-bordered table-striped">
			<tr>
				<th>Name</th>
				<td><?=$item_row->name?></td>
			</tr>
			<tr>
				<th>Size</th>
				<td><?=$item_row->size?></td>
			</tr>
			<tr>
				<th>Color</th>
				<td><?=$item_row->color?></td>
			</tr>
			<tr>
				<th>Weight</th>
				<td><?=$item_row->weight?></td>
			</tr>
			<tr>
				<th>Notes</th>
				<td><?=$item_row->notes?></td>
			</tr>
			<tr>
				<th>Name</th>
				<td><?=$item_row->name?></td>
			</tr>
		</table>
	</div>
	 <div class="col-md-6">
		<h3>Item History</h3>
		<table class="table table-bordered table-striped">
			<tr>
				<th>Shop Name</th>
				<th>Date</th>
				<th>Type</th>
			</tr>
			<tr>
				<td><?=$item_row->warehouse_name?></td>
				<td><?=get_date($item_row->created_at);?></td>
				<td>Created</td>
			</tr>
		</table>
	</div> 
	<!-- <div class="col-md-3">
		<h3>Notes</h3>
		<table class="table table-bordered table-striped">
			<tr>
				<th>Notes</th>
			</tr>
			<?php foreach ($notes as $v): ?>
			<tr>
				<td><?=$v->notes?></td>
			</tr>
			<?php endforeach ?>
		</table>
	</div> -->
</div>