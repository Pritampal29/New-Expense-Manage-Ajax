<?php

include('./inc/header.php'); 

$uid = $_SESSION['id'];


$today= date('Y-m-d');

$yesterday= date('Y-m-d',strtotime('yesterday'));

$firstDateOfMonth = date('Y-m-01');
$lastDateOfMonth = date('Y-m-t');

$firstDateOfYear = date('Y-01-01');
$lastDateOfYear = date('Y-12-31');

// Previous Dates

$firstDateOfPreviousMonth = date('Y-m-01', strtotime('first day of last month'));
$lastDateOfPreviousMonth = date('Y-m-t', strtotime('last day of last month'));

$firstDateOfPreviousYear = date('Y-01-01', strtotime('first day of last year'));
$lastDateOfPreviousYear = date('Y-12-31', strtotime('last day of last year'));

?>


<div class="container mt-4">

    <div class="row">

        <div class="col-md-4 col-sm-6 each_box">
            <div class="card date_card">
                <div class="card-header bg-info">
                    <h3>Today</h3>
                </div>
                <div class="card-body" id="data1">
                    <h4 class="text-right">
                        <?php 
                            $select= "SELECT SUM(amount) FROM expenses WHERE user_id='$uid' AND `date`='$today' ";
                            $query= mysqli_query($conn,$select);

                            while($row=mysqli_fetch_assoc($query)) { 
                                if($row['SUM(amount)'] !=''){
                                    echo $row['SUM(amount)'].'.00';
                                }else{
                                    echo "00";
                                }
                            }
                        ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 each_box">
            <div class="card date_card">
                <div class="card-header bg-info">
                    <h3>This Month</h3>
                </div>
                <div class="card-body" id="data1">
                    <h4 class="text-right">
                    <?php 
                        $select= "SELECT SUM(amount) FROM expenses WHERE user_id='$uid' AND `date` BETWEEN '$firstDateOfMonth' AND '$lastDateOfMonth' ";
                        $query= mysqli_query($conn,$select);

                        while($row=mysqli_fetch_assoc($query)) { 
                            if($row['SUM(amount)'] !=''){
                                echo $row['SUM(amount)'].'.00';
                            }else{
                                echo "00";
                            }
                        }
                    ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 each_box">
            <div class="card date_card">
                <div class="card-header bg-info">
                    <h3>This Year</h3>
                </div>
                <div class="card-body" id="data1">
                    <h4 class="text-right">
                    <?php 
                        $select= "SELECT SUM(amount) FROM expenses WHERE user_id='$uid' AND `date` BETWEEN '$firstDateOfYear' AND '$lastDateOfYear' ";
                        $query= mysqli_query($conn,$select);

                        while($row=mysqli_fetch_assoc($query)) { 
                            if($row['SUM(amount)'] !=''){
                                echo $row['SUM(amount)'].'.00';
                            }else{
                                echo "00";
                            }
                        }
                    ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 each_box">
            <div class="card date_card">
                <div class="card-header bg-warning">
                    <h3>Yesterday</h3>
                </div>
                <div class="card-body" id="data1">
                    <h4 class="text-right">
                        <?php 
                        $select= "SELECT SUM(amount) FROM expenses WHERE user_id='$uid' AND `date`='$yesterday' ";
                        $query= mysqli_query($conn,$select);

                        while($row=mysqli_fetch_assoc($query)) { 
                            if($row['SUM(amount)'] !=''){
                                echo $row['SUM(amount)'].'.00';
                            }else{
                                echo "00";
                            }
                        }
                    ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 each_box">
            <div class="card date_card">
                <div class="card-header bg-warning">
                    <h3>Last Month</h3>
                </div>
                <div class="card-body" id="data1">
                    <h4 class="text-right">
                    <?php 
                        $select= "SELECT SUM(amount) FROM expenses WHERE user_id='$uid' AND `date` BETWEEN '$firstDateOfPreviousMonth' AND '$lastDateOfPreviousMonth' ";
                        $query= mysqli_query($conn,$select);

                        while($row=mysqli_fetch_assoc($query)) { 
                            if($row['SUM(amount)'] !=''){
                                echo $row['SUM(amount)'].'.00';
                            }else{
                                echo "00";
                            }
                        }
                    ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 each_box">
            <div class="card date_card">
                <div class="card-header bg-warning">
                    <h3>Last Year</h3>
                </div>
                <div class="card-body" id="data1">
                    <h4 class="text-right">
                    <?php 
                        $select= "SELECT SUM(amount) FROM expenses WHERE user_id='$uid' AND `date` BETWEEN '$firstDateOfPreviousYear' AND '$lastDateOfPreviousYear' ";
                        $query= mysqli_query($conn,$select);

                        while($row=mysqli_fetch_assoc($query)) { 
                            if($row['SUM(amount)'] !=''){
                                echo $row['SUM(amount)'].'.00';
                            }else{
                                echo "00";
                            }
                        }
                    ?>
                    </h4>
                </div>
            </div>
        </div>

    </div>

</div>


<?php
include('./inc/footer.php'); ?>