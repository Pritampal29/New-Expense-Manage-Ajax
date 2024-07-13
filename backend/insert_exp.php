<?php
session_start();

include('../inc/config.php'); 

if(isset($_POST['date']) && isset($_POST['amount']) && isset($_POST['purpose'])) {

    $date = $_POST['date'];
    $purpose = $_POST['purpose'];
    $amount = $_POST['amount'];
    $uid = $_SESSION['id'];

    $insert = "INSERT INTO `expenses`(`purpose`,`amount`,`date`,`user_id`) VALUES('$purpose','$amount','$date','$uid')";
    $result = mysqli_query($conn,$insert);

}


?>