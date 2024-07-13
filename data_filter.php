<?php
include('./inc/header.php'); 
?>


<div class="container mt-4">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-headerss search_hdd bg-info text-center">
                    <div class="title">
                        <h2 class="text-white">Search Reports by Date Range</h2>
                    </div>
                    <div class="col-8 text-start mx-auto" id="searchField">
                        <div class="date-picker-container">
                            <input type="date" id="from-date" class="date-picker" />
                            <i class="fas fa-arrow-circle-right"></i>
                            <input type="date" id="to-date" class="date-picker" />
                        </div>
                    </div>
                </div>
                <div class="card-body" id="searchTable">
                    <table id=myTable class="table table-bordered table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>Id</th>
                                <th>Date</th>
                                <th>Purpose</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody id="tableSearchData" class="text-center">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
include('./inc/footer.php'); ?>