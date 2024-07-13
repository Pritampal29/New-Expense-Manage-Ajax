<?php
include('../inc/config.php');

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $d_query = "DELETE FROM `expenses` WHERE `id`='$id'";
    $q_fire = mysqli_query($conn,$d_query);
    
}


?>