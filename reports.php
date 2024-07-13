<?php
include('./inc/header.php'); 
?>


<div class="container mt-4">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2 class="text-white">Expenses Reports</h2>
                    <div class="col-3 text-start" id="searchField">
                        <input type="search" name="search" id="srch_fld" class="form-control"
                            placeholder="Search Data...">
                    </div>
                </div>
                <div class="card-body" id="mainTable">
                    <table id=myTable class="table table-bordered table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>Id</th>
                                <th>Date</th>
                                <th>Purpose</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableData" class="text-center">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="float-icon">
        <button class="addDetails" id="addData" type="button" data-toggle="modal" data-target="#myModal">
            <i class="fas fa-cart-plus"></i>
        </button>
    </div>

</div>


<?php
include('./inc/footer.php'); ?>