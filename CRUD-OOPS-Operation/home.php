<?php

session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
    header('location:index.php');
}

// Include database file
include 'customers.php';

$customerObj = new Customers();

// Delete record from table
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $customerObj->deleteRecord($deleteId);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP OOP CRUD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #0669d7;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            color: #bdeafa;
            text-decoration: none;
        }

    </style>
</head>
<body>

<ul style="margin-bottom: 10px">
    <li><a href="home.php">Home</a></li>
    <li><a href="toernooi.php">Toernooien</a></li>
    <li><a href="#">Test</a></li>
    <li style="float:right"><a  href="logout.php">Log uit</a></li>
</ul>

<div class="container">
    <?php
    if (isset($_GET['msg1']) == "insert") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration added successfully
            </div>";
    }
    if (isset($_GET['msg2']) == "update") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Record deleted successfully
            </div>";
    }
    ?>
    <h2>Users
        <a href="add.php" class="btn btn-primary" style="float:right;">Add New User</a>
    </h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $customers = $customerObj->displayData();
        foreach ($customers as $customer) {
            ?>
            <tr>
                <td><?php echo $customer['id'] ?></td>
                <td><?php echo $customer['name'] ?></td>
                <td><?php echo $customer['email'] ?></td>
                <td><?php echo $customer['username'] ?></td>
                <td>
                    <a href="edit.php?editId=<?php echo $customer['id'] ?>" style="color:green">
                        <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                    <a href="home.php?deleteId=<?php echo $customer['id'] ?>" style="color:#ff0000" onclick="confirm('Are you sure want to delete this record')">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>