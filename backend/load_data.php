<?php
session_start();

include('../inc/config.php');

$u_id = $_SESSION['id']; 

$id = $_POST['id'];

$query = "SELECT * FROM `expenses` WHERE `id`='$id' AND `user_id`='$u_id'";
$result = mysqli_query($conn,$query);

$count = mysqli_num_rows($result);

$output = "";

    if($count > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $output .= '<form class="form-group" id="myUpdateForm">
                            <input name="uname" type="text" id="u-id" hidden value="'.$row['id'].'">
                            <label for="updPurpose">Purpose</label>
                            <input type="text" name="upd_purpose" id="updPurpose" class="form-control" value="'.$row['purpose'].'">
                            <label for="updAmount">Amount</label>
                            <input type="number" name="upd_amount" id="updAmount" class="form-control" value="'.$row['amount'].'">

                            <button type="button" id="updateBtn" class="btn btn-info text-center" data-sid="">Update Data</button>
                        </form>';
        }
    }

    echo $output;


?>