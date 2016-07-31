<!DOCTYPE html>
<html lang="en-US" ng-app="productRecords">
    <head>
        <title>Laravel 5 AngularJS CRUD Example</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    </head>
    <body>
        <h2>Product Database</h2>
        <div  ng-controller="ProductController">

            <!-- Table-to-load-the-data Part -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ProductName</th>
                        <th>Capacity</th>
                        <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Add New Product</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="product in products">
                        <td>{{ product.id }}</td>
                        <td>{{ product.ProductName }}</td>
                        <td>{{ product.Capacity }}</td>
                        <td>
                            <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', product.id)">Edit</button>
                            <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(product.id)">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End of Table-to-load-the-data Part -->
            <!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
                        </div>
                        <div class="modal-body">
                            <form name="frmEmployees" class="form-horizontal" novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="ProductName" name="ProductName" placeholder="Fullname" value="{{ProductName}}" 
                                        ng-model="product.ProductName" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmEmployees.ProductName.$invalid && frmEmployees.ProductName.$touched">Name field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Capacity</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="Capacity" name="Capacity" placeholder="Capacity" value="{{Capacity}}" 
                                        ng-model="product.Capacity" ng-required="true">
                                        <span class="help-inline" 
                                        ng-show="frmEmployees.Capacity.$invalid && frmEmployees.Capacity.$touched">Valid Email field is required</span>
                                    </div>
                                </div>                      

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/jquery.min.js') ?>"></script>
        <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
        
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/products.js') ?>"></script>
    </body>
</html>