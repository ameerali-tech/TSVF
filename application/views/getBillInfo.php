<div class="col-md-12">
  <table class="table table-bordered">
    <tr>
      <th>Item Name</th>
      <th>Buy Price</th>
      <th>Retail Price</th>
      <th>Qty</th>
      <th>Tax %</th>
      <th>Sub Total</th>
    </tr>
    <?php foreach ($warehouse_data as $warehouse_data) {
      # code...
     ?>
    <tr>
      <td><?=$warehouse_data->item_name?></td>
      <td><?=$warehouse_data->buy_price?></td>
      <td><?=$warehouse_data->retail_price ?></td>
      <td><?=$warehouse_data->qty?></td>
      <td><?=$warehouse_data->tax?></td>
      <td><?=$warehouse_data->sub_total?></td>
    </tr>
  <?php } ?>
  </table>
</div>
