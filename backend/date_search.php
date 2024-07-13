<?php
session_start();
include('../inc/config.php');

$u_id = $_SESSION['id']; 

$from = $_POST['formdate'];
$to = $_POST['todate'];

$query = "SELECT * FROM `expenses` WHERE `date` BETWEEN '$from' AND '$to' && `user_id`='$u_id' ORDER BY `date` ASC";
$result = mysqli_query($conn,$query);

$count = mysqli_num_rows($result);

$output = "";

if($count > 0) {
    $i=1;
    while($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                        <td>".$i."</td>
                        <td>".$row['date']."</td>
                        <td>".$row['purpose']."</td>
                        <td>".$row['amount']."</td>
                    </tr>";
            $select1 = "SELECT SUM(amount) FROM `expenses` WHERE `date` BETWEEN '$from' AND '$to' && `user_id`='$u_id' ORDER BY `date` DESC";
        
            $query1= mysqli_query($conn,$select1);

            while($row=mysqli_fetch_assoc($query1)) { 
                $totalAmount = $row['SUM(amount)'];
            }
            $i++;

    }
    $output .= "<tr class='bg-warning'>
                    <td colspan='3'><strong>Total:</strong></td>
                    <td><strong>".$totalAmount."</strong></td>
                </tr>";
} else {
    $output .= "<tr><td colspan=4> No Data Found...</td></tr>";
}

echo $output;