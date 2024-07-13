<?php 
session_start();
include('./inc/config.php'); 

$admin = $_SESSION['role'];

if(empty($_SESSION)){
    header("location:./login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Daily Expenses</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body id="reportsPage">

    <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
            <a class="navbar-brand" href="./index.php">
                <h1 class="tm-site-title mb-0">Pritam Pal</h1>
            </a>
            <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars tm-nav-icon"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto h-100">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <button class="nav-link" type="button" data-toggle="modal" data-target="#myModal">
                            <i class="fas fa-shopping-cart"></i>
                            Add Expenses
                        </button>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="./reports.php">
                            <i class="far fa-file-alt"></i>
                            Reports
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./data_filter.php">
                            <i class="fas fa-search-plus"></i>
                            Filter Data
                        </a>
                    </li>
                    
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-file-alt"></i>
                            <span>
                                Reports <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Daily Report</a>
                            <a class="dropdown-item" href="#">Weekly Report</a>
                            <a class="dropdown-item" href="#">Yearly Report</a>
                        </div>
                    </li> -->
                    <?php if( $admin == 1 ){?>
                    <li class="nav-item">
                        <a class="nav-link" href="./users.php">
                            <i class="far fa-user"></i>
                            All Users
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <h6 class="text-white mt-3">Hello <?php echo $_SESSION['name'];?></h6>
                        <a class="nav-link d-block" href="logout.php"><b>Logout</b></a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>



    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-secondary">
                    <h4 class="modal-title text-white">Add Expenses</h4>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form-group" id="myInsForm">
                        <label for="insDate">Date</label>
                        <input type="date" name="ins_date" id="insDate" class="form-control" value="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" required>
                        <label for="insPurpose">Purpose</label>
                        <input type="text" name="ins_purpose" id="insPurpose" class="form-control">
                        <label for="insAmount">Amount</label>
                        <input type="number" name="ins_amount" id="insAmount" class="form-control">

                        <button type="button" id="saveBtn" class="btn btn-primary text-center" data-sid="">Save
                            Data</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <!-- The Update Modal -->
    <div class="modal fade" id="updateModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Update Expenses</h4>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="update-modal-body">
                    
                </div>

            </div>
        </div>
    </div>