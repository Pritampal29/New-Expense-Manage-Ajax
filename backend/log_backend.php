<?php
session_start();
include('../inc/config.php');

if(isset($_POST['Login'])){
    $email      =$_POST['email'];
    $password   =$_POST['password'];

    if(!empty($email) && !empty($password)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $select ="SELECT * FROM `users` WHERE email='$email'";
            $query  =mysqli_query($conn,$select);
            $result =mysqli_fetch_assoc($query);
            // print_r($result);die();
            if(mysqli_num_rows($query)>0){
                $pass_match = md5($password,$result['password']);
                //print_r($pass_match);die();
                if($pass_match){
                    $_SESSION['id']     =$result['id'];
                    $_SESSION['name']   =$result['name'];
                    $_SESSION['role']   =$result['role'];
                    // print_r($_SESSION['role']);die();
                    header("location:../index.php");
                }else{
                    header("location:../login.php?error="."Invalid Credential");
                }
            }else{
                header("location:../login.php?error="."Email not found");
            }
        }else{
            header("location:../login.php?error="."Input a valid email adress");
        }
        
    }else{

    }
}











?>