
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reports</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body onload="window.print();">
    <br>
    <h4 align="center">ODACITY</h4>
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <table width="100%" class="m-5">
          <tr>
            <th>Item:</th>
            <td><?php
            $iid=$arr['item_id'];
            if ($arr['item_id']!='all') {
                $iid=@$rows[0]->name;
            }echo $iid;?></td>
          </tr>
          <tr>
            <th>From date:</th>
            <td><?=date('d-m-Y',strtotime($arr['from_date']))?></td>
          </tr>
          <tr>
            <th>To date:</th>
            <td><?=date('d-m-Y',strtotime($arr['to_date']))?></td>
          </tr>
          <tr>
            <th>Total records:</th>
            <td><?=count($rows);?></td>
          </tr>
        </table>
      </div>
      <div class="col-md-4">

      </div>
    </div>
    
    <table class="table table-bordered table-striped">
      <tr>
        <th>S.No</th>
        <th>Item</th>
        <th>Qty</th>
        <th>Date</th>
      </tr>
      <?php $i=1; foreach ($rows as $v): ?>
        <tr>
          <td><?=$i?></td>
          <td><?=$v->name?></td>
          <td><?=$v->sale_qty?></td>
          <td><?=date('d-m-Y',strtotime($v->sale_date))?></td>
        </tr>
      <?php $i++; endforeach; ?>
    </table>
  </body>
</html>
