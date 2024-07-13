<?php

include('./inc/header.php'); 

$select = "SELECT * FROM `users`";
$query = mysqli_query($conn,$select);

$result = mysqli_num_rows($query);

?>


<div class="container mt-4">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h2 class="text-white text-center">Users List</h2>
                </div>
                <div class="card-body" id="mainTable">
                    <table id=myuserTable class="table table-bordered table-striped">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email Id</th>
                                <th>Register Date</th>
                            </tr>
                        </thead>
                        <tbody id="userData" class="text-center">
                            <?php 
                            if($result > 0) {
                                $i = 1;
                                while($row = mysqli_fetch_assoc($query)) {?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['date'];?></td>
                            </tr>
                            <?php $i++; 
                                    } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
include('./inc/footer.php'); ?>