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
                        <form class="form" method="post" action="<?=base_url();?>admin/save_role">
                            <input type="hidden" name="warehouse_id" value="<?=hashids_encrypt(@$form_data->id)?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="basicInput">Role Name</label>
                                            <input type="text" name="role_name" class="form-control" placeholder="enter role name" value="<?=@$role_name->role_name?>" required="">
                                        </fieldset>
                                    </div>
                                </div>
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
                                          <tr>
                                            <td>Users</td>
                                            <input type="checkbox" name="users[module_component]" value="users" hidden="" checked="">
                                            <td><input type="checkbox" name="users[view_status]" value="yes"></td>
                                            <td><input type="checkbox" name="users[add_status]" value="yes"></td>
                                            <td><input type="checkbox" name="users[edit_status]" value="yes"></td>
                                            <td><input type="checkbox" name="users[delete_status]" value="yes"></td>
                                          </tr>
                                          <tr>
                                            <td>User Roles</td>
                                            <input type="checkbox" name="user_roles[module_component]" value="user_roles" hidden="" checked="">
                                            <td><input type="checkbox" name="user_roles[view_status]" value="yes"></td>
                                            <td><input type="checkbox" name="user_roles[add_status]" value="yes"></td>
                                            <td><input type="checkbox" name="user_roles[edit_status]" value="yes"></td>
                                            <td><input type="checkbox" name="user_roles[delete_status]" value="yes"></td>
                                          </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Customers</h3>
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
                                            <td>Customers</td>
                                            <input type="checkbox" name="customers[module_component]" value="customers" hidden="" checked="">
                                            <td><input type="checkbox" name="customers[view_status]" value="yes"></td>
                                            <td><input type="checkbox" name="customers[add_status]" value="yes"></td>
                                            <td><input type="checkbox" name="customers[edit_status]" value="yes"></td>
                                            <td><input type="checkbox" name="customers[delete_status]" value="yes"></td>
                                          </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Properties</h3>
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
                                            <td>Properties</td>
                                            <input type="checkbox" name="products[module_component]" value="properties" hidden="" checked="">
                                            <td><input type="checkbox" name="products[view_status]" value="yes"></td>
                                            <td><input type="checkbox" name="products[add_status]" value="yes"></td>
                                            <td><input type="checkbox" name="products[edit_status]" value="yes"></td>
                                            <td><input type="checkbox" name="products[delete_status]" value="yes"></td>
                                          </tr>
                                      </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Suppliers</h3>
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
                                            <td>Suppliers</td>
                                            <input type="checkbox" name="suppliers[module_component]" value="suppliers" hidden="" checked="">
                                            <td><input type="checkbox" name="suppliers[view_status]" value="yes"></td>
                                            <td><input type="checkbox" name="suppliers[add_status]" value="yes"></td>
                                            <td><input type="checkbox" name="suppliers[edit_status]" value="yes"></td>
                                            <td><input type="checkbox" name="suppliers[delete_status]" value="yes"></td>
                                          </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                                        <h3>Quotes</h3>
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
                                            <td>Quotes</td>
                                            <input type="checkbox" name="quotes[module_component]" value="quotes" hidden="" checked="">
                                            <td><input type="checkbox" name="quotes[view_status]" value="yes"></td>
                                            <td><input type="checkbox" name="quotes[add_status]" value="yes"></td>
                                            <td><input type="checkbox" name="quotes[edit_status]" value="yes"></td>
                                            <td><input type="checkbox" name="quotes[delete_status]" value="yes"></td>
                                          </tr>
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
