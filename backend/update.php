<?php

session_start();

include('../inc/config.php');

$u_id = $_SESSION['id']; 

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $purpose = $_POST['purpose'];
    $amount = $_POST['amount'];

    $update = "UPDATE `expenses` SET `purpose` = '$purpose', `amount`='$amount' WHERE `id`='$id' AND `user_id`='$u_id'";
    $query = mysqli_query($conn,$update);

}