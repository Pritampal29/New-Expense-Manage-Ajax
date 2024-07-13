<?php
session_start();

include('../inc/config.php');

$u_id = $_SESSION['id']; 

$query = "SELECT * FROM `expenses` WHERE `user_id`='$u_id' ORDER BY `date` DESC";
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
                            <td>
                                <button type='button' id='editBtn' data-toggle='modal' data-target='#updateModal' class='btn btn-success'
                                    data-eid='".$row['id']."'>Edit</button>
                                <button type='button' id='deleteBtn' class='btn btn-danger'
                                    data-did='".$row['id']."'>Delete</button>
                            </td>
                        </tr>";
                        $select1 = "SELECT SUM(amount) FROM `expenses` WHERE user_id='$u_id'";
                  
                        $query1= mysqli_query($conn,$select1);

                        while($row=mysqli_fetch_assoc($query1)) { 
                            $totalAmount = $row['SUM(amount)'];
                        }
                        $i++;

        }
        $output .= "<tr class='bg-warning'>
                        <td colspan='3'><strong>Total:</strong></td>
                        <td><strong>".$totalAmount."</strong></td>
                        <td></td>
                    </tr>";
    } else {
        $output .= "<tr><td colspan=5> No Data Found...</td></tr>";
    }

    echo $output;



?>