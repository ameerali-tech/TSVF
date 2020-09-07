<style media="screen">
.document_div {
  display: block;
  border: 1px solid #ccc;
  margin: 5px; padding: 5px;
  box-shadow: 0 0 1px 0px rgba(0,0,0,0.1);
  background: #f2f2f2;
}
.add_new_doc_btn {
  display: block;
  margin: 15px;
}
.remove_btn {
  padding: 0px 10px;
  float: right;
  color: #ad1902;
}
.remove_btn:hover {
  color: #4a0601;
}
</style>
<div class="main-content">

  <div class="content-wrapper"><!--Statistics cards Starts-->

      <div class="row">

        <div class="col-sm-12">

          <div class="card">

            <div class="card-header">

              <h4 class="card-title">Quotes Details</h4>

            </div>

            <div class="card-body">

              <div class="card-block">
                <table class="table table-bordered details_table">

                    <tbody>
                        <tr>
                          <th>Quote # </th>
                          <td><?=@$record[0]->quote_id?></td>
                        </tr>
                        <tr>
                          <th>Customer First Name</th>
                          <td><?=@$record[0]->first_name?></td>
                        </tr>
                        <tr>
                          <th>Customer Last Name</th>
                          <td><?=@$record[0]->last_name?></td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td><?=@$record[0]->email?></td>
                        </tr>
                      <tr>
                        <th>Property Name</th>
                        <td><?=@$record[0]->name?></td>
                      </tr>
                      <tr>
                        <th>lot size</th>
                        <td><?=@$record[0]->lot_size?></td>
                      </tr>
                      <tr>
                        <th>Amount / Square Meter</th>
                        <td><?=@$record[0]->amountpersquaremeter?></td>
                      </tr>
                      <tr>
                        <th>cost</th>
                        <td><?=@$record[0]->cost?></td>
                      </tr>
                      <tr>
                        <th>SKU</th>
                        <td><?=@$record[0]->sku?></td>
                      </tr>
                      <tr>
                        <th>Payment Terms</th>
                        <td><?=@$record[0]->payment_terms?></td>
                      </tr>
                      <tr>
                        <th>Total Amount</th>
                        <td><?=@$record[0]->total_amount?></td>
                      </tr>
                      <tr>
                        <th>Payment Method</th>
                        <td><?=@$record[0]->payment_method?></td>
                      </tr>
                      <tr>
                        <th>Notes</th>
                        <td><?=$record[0]->notes?></td>
                      </tr>
                  </tbody>
                </table>
              </div>

            </div>

          </div>

        </div>

      </div>

  </div>

</div>

</div>
