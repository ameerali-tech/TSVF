<div class="main-content">
          <div class="content-wrapper"><!-- Basic Elements start -->
<section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"><?=$title?></h4>
                </div> <br>
                <div class="card-body">
                    <div class="px-3">
                        <form class="form" method="post" action="<?=base_url();?>admin/update_role">
                            <input type="hidden" name="role_id" value="<?=hashids_encrypt(@$role_name->id)?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Role Name</label>
                                            <input type="text" name="role_name" class="form-control" placeholder="enter role name" value="<?=@$role_name->role_name?>" required="">
                                        </fieldset>
                                    </div>
                                </div>
                            <?php foreach ($role_data as $value) { 
                            	if ($value->module_component == 'main_dasboard') {?>    
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Dasboard</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Module Component</th>
                                            <th>View</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>  
                                            <td>Main Dashboard</td>
                                            <input type="checkbox" name="main_dasboard[module_component]" value="main_dasboard" hidden="" checked="">
                                            <td><input type="checkbox" name="main_dasboard[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="main_dasboard[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="main_dasboard[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="main_dasboard[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            <?php }

                        } ?>    

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Configurations </h3>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Module Component</th>
                                            <th>View</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                    <?php foreach ($role_data as $value) {
                                    	if ($value->module_component == 'users') { ?>    	 
                                          <tr>
                                            <td>Users</td>
                                            <input type="checkbox" name="users[module_component]" value="users" hidden="" checked="">
                                            <td><input type="checkbox" name="users[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="users[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="users[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="users[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }if($value->module_component == 'user_roles'){ ?>
                                          <tr>
                                            <td>User Roles</td>
                                            <input type="checkbox" name="user_roles[module_component]" value="user_roles" hidden="" checked="">
                                            <td><input type="checkbox" name="user_roles[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="user_roles[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="user_roles[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="user_roles[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }if ($value->module_component == 'warehouse') { ?>
                                          <tr>
                                            <td>Warehouse</td>
                                            <input type="checkbox" name="warehouse[module_component]" value="warehouse" hidden="" checked="">
                                            <td><input type="checkbox" name="warehouse[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="warehouse[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="warehouse[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="warehouse[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }} ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Sale Order</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Module Component</th>
                                            <th>View</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                    <?php foreach ($role_data as $value) { if ($value->module_component == 'sale_order') {?>    	
                                          <tr>
                                            <td>Sale Order</td>
                                            <input type="checkbox" name="sale_order[module_component]" value="sale_order" hidden="" checked="">
                                            <td><input type="checkbox" name="sale_order[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="sale_order[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="sale_order[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="sale_order[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }if ($value->module_component == 'customers') { ?>
                                          <tr>
                                            <td>Customers</td>
                                            <input type="checkbox" name="customers[module_component]" value="customers" hidden="" checked="">
                                            <td><input type="checkbox" name="customers[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="customers[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="customers[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="customers[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr> 
                                      <?php }} ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Inventory </h3>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Module Component</th>
                                            <th>View</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                    <?php foreach ($role_data as $value) { if ($value->module_component == 'products') {?>      <tr>
                                            <td>Products</td>
                                            <input type="checkbox" name="products[module_component]" value="products" hidden="" checked="">
                                            <td><input type="checkbox" name="products[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="products[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="products[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="products[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }if ($value->module_component == 'product_adjustments') { ?>
                                          <tr>
                                            <td>Product Adjustments</td>
                                            <input type="checkbox" name="product_adjustments[module_component]" value="product_adjustments" hidden="" checked="">
                                            <td><input type="checkbox" name="product_adjustments[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="product_adjustments[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="product_adjustments[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="product_adjustments[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }} ?>
                                      </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Purchase Order</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Module Component</th>
                                            <th>View</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                    <?php foreach ($role_data as $value) { if ($value->module_component == 'purchase_order') {?>    	<tr>
                                            <td>Purchase Order</td>
                                            <input type="checkbox" name="purchase_order[module_component]" value="purchase_order" hidden="" checked="">
                                            <td><input type="checkbox" name="purchase_order[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="purchase_order[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="purchase_order[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="purchase_order[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }if ($value->module_component == 'suppliers') { ?>
                                          <tr>
                                            <td>Suppliers</td>
                                            <input type="checkbox" name="suppliers[module_component]" value="suppliers" hidden="" checked="">
                                            <td><input type="checkbox" name="suppliers[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="suppliers[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="suppliers[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="suppliers[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }if ($value->module_component == 'return_purchase_order') { ?>
                                          <tr>
                                            <td>Return Purchase Order</td>
                                            <input type="checkbox" name="return_purchase_order[module_component]" value="return_purchase_order" hidden="" checked="">
                                            <td><input type="checkbox" name="return_purchase_order[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="return_purchase_order[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="return_purchase_order[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="return_purchase_order[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }} ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Inventory Report</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Module Component</th>
                                            <th>View</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($role_data as $value) { if ($value->module_component == 'product_list') {?>
                                          <tr>
                                            <td>Product List</td>
                                            <input type="checkbox" name="product_list[module_component]" value="product_list" hidden="" checked="">
                                            <td><input type="checkbox" name="product_list[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="product_list[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="product_list[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="product_list[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }if ($value->module_component == 'inventory_stock') {?>
                                          <tr>
                                            <td>Inventory Stock</td>
                                            <input type="checkbox" name="inventory_stock[module_component]" value="inventory_stock" hidden="" checked="">
                                            <td><input type="checkbox" name="inventory_stock[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="inventory_stock[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="inventory_stock[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="inventory_stock[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }if ($value->module_component == 'inventory_summary') {?>
                                          <tr>
                                            <td>Inventory Summary</td>
                                            <input type="checkbox" name="inventory_summary[module_component]" value="inventory_summary" hidden="" checked="">
                                            <td><input type="checkbox" name="inventory_summary[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="inventory_summary[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="inventory_summary[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="inventory_summary[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }if ($value->module_component == 'product_summary') {?>
                                          <tr>
                                            <td>Product Summary</td>
                                            <input type="checkbox" name="product_summary[module_component]" value="product_summary" hidden="" checked="">
                                            <td><input type="checkbox" name="product_summary[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="product_summary[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="product_summary[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="product_summary[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }} ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Supplier Report</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Module Component</th>
                                            <th>View</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($role_data as $value) { if ($value->module_component == 'supplier_ledger') {?>
                                          <tr>
                                            <td>Supplier Ledger</td>
                                            <input type="checkbox" name="supplier_ledger[module_component]" value="supplier_ledger" hidden="" checked="">
                                            <td><input type="checkbox" name="supplier_ledger[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="supplier_ledger[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="supplier_ledger[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="supplier_ledger[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }if ($value->module_component == 'supplier_list') { ?>
                                          <tr>
                                            <td>Supplier List</td>
                                            <input type="checkbox" name="supplier_list[module_component]" value="supplier_list" hidden="" checked="">
                                            <td><input type="checkbox" name="supplier_list[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="supplier_list[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="supplier_list[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="supplier_list[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }} ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Purchase Report</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Module Component</th>
                                            <th>View</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($role_data as $value) { if ($value->module_component == 'purchase_order') {?>
                                          <tr>
                                            <td>Purchase order</td>
                                            <input type="checkbox" name="purchase_order_report[module_component]" value="purchase_order_report" hidden="" checked="">
                                            <td><input type="checkbox" name="purchase_order_report[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="purchase_order_report[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="purchase_order_report[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="purchase_order_report[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                          <?php }if ($value->module_component == 'return_purchase_order') {?> 
                                          <tr>
                                            <td>Return Purchase Order</td>
                                            <input type="checkbox" name="return_purchase_order_report[module_component]" value="return_purchase_order_report" hidden="" checked="">
                                            <td><input type="checkbox" name="return_purchase_order_report[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="return_purchase_order_report[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="return_purchase_order_report[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="return_purchase_order_report[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }} ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Customer Report</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Module Component</th>
                                            <th>View</th>
                                            <th>Add</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($role_data as $value) { if ($value->module_component == 'customer_ledger') {?>
                                          <tr>
                                            <td>Customer Ledger</td>
                                            <input type="checkbox" name="customer_ledger[module_component]" value="customer_ledger" hidden="" checked="">
                                            <td><input type="checkbox" name="customer_ledger[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="customer_ledger[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="customer_ledger[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="customer_ledger[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }if ($value->module_component == 'customer_list') {?>
                                          <tr>
                                            <td>Customer List</td>
                                            <input type="checkbox" name="customer_list[module_component]" value="customer_list" hidden="" checked="">
                                            <td><input type="checkbox" name="customer_list[view_status]" value="yes" <?php echo ($value->view_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="customer_list[add_status]" value="yes" <?php echo ($value->add_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="customer_list[edit_status]" value="yes"  <?php echo ($value->edit_status =='yes'?'checked':'')?>></td>
                                            <td><input type="checkbox" name="customer_list[delete_status]" value="yes" <?php echo ($value->delete_status =='yes'?'checked':'')?>></td>
                                          </tr>
                                      <?php }} ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="form-actions">
                                <div class="text-right">
                                    <button type="Submit" class="btn btn-raised btn-primary">Submit <i class="ft-thumbs-up position-right"></i></button>
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