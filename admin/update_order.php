<?php
include "./includes/conn.php";
$id = $_GET['id'];


$get_all = mysqli_fetch_assoc(mysqli_query($conn , "select * from `tbl_order` WHERE `orderid`='$id'"));

 if(isset($_POST['update_me'])){
    $status1 = $_POST['status1'];
    $remarks1 = $_POST['remarks1'];
    $date = $_POST['date'];
    $update = mysqli_query($conn , "UPDATE `tbl_order` SET `remarks`='$remarks1',`order_status`='$status1',`status_date`='$date'  WHERE `orderid`='$id'");
 
    if($update){
        echo "<script>window.location.replace('order-detail-history-staff.php')</script>";
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
    <div class="row">
    <div class="col-md-6 mr-auto">
    <form method='POST'>
        <h2>Your Order ID is : <?php echo $id ?></h2>
        <div class='form-group'>
            <label for='email'>Order Status:</label>
            <select class='form-control' name='status1' important>
                <option selected disabled><?php echo  $get_all['order_status']?></option>                

                <option value='Pending_Order'>Pending Order</option>
                <option value='Delevered_Order'>Delivered Order</option>
                <option value='Return_Order'>Return Order</option>
                <option value='Cancel_Order'>Cancel Order</option>
                <option value='Placed_Order'>Placed Order</option>
            </select>
        </div>

        <div class='form-group'>
            <label for='email'>Enter Remarks:</label>
            <textarea type='text' class='form-control' placeholder='Enter Remarks' name='remarks1' important><?php echo $get_all['remarks']?></textarea>
        </div>

        <div class='form-group'>
            <label for='email'>Select Date:</label>
            <input type='date' class='form-control'  name='date' important value="<?php echo $get_all['status_date']?>">
        </div>

        <button type='submit' name='update_me' class='btn btn-success'>Update</button>
    </form>
    </div>
</div>
</div>
</body>

</html>