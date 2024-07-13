<?php

include("../inc/config.php");

if(isset($_POST['Register'])){
    $uname      =$_POST['uname'];
    $uemail     =$_POST['uemail'];
    $password   =$_POST['password'];

    if((!empty($uname))&&(!empty($uemail))&&(!empty($password))){
        if(filter_var($uemail,FILTER_VALIDATE_EMAIL)){
            $select ="SELECT * FROM `users` WHERE email='$uemail'";
            $query  =mysqli_query($conn,$select);
            //print_r($query);die();
            $result =mysqli_num_rows($query);
            //print_r($result);die();
            if($result>0){
                header("location:../login.php?error="."Email Already Exist");
            }else{
                $pass_hash  =md5($password);
                //print_r($pass_hash);die();
                $insert     ="INSERT INTO `users`(name,email,password,role) VALUES('$uname','$uemail','$pass_hash',2)";
                $query      =mysqli_query($conn,$insert);
                if($query){
                    header("location:../index.php");
                }
            }
        }else{
            header("location:../register.php?error="."Enter a valid Email ID");
        }
    }else{
        header("location:../register.php?error="."Input all the field");
    }
}




?>