<?php

session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) ||(trim ($_SESSION['user']) == '')){
    header('location:index.php');
}

// Include database file
include 'customers.php';

$toernooienObj = new Customers();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP: CRUD (Add, Edit, Delete, View) Application using OOP (Object Oriented Programming) and MYSQL</title>
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
            background-color: #333;
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

        li a:hover:not(.active) {
            background-color: #111;
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

<div class="container" style="margin-top: 100px;">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Naam</th>
            <th>Datum</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $toernooien = $toernooienObj->displayData1();
        foreach ($toernooien as $toernooi) {
            ?>
            <tr>
                <td><?php echo $toernooi['id'] ?></td>
                <td><?php echo $toernooi['naam'] ?></td>
                <td><?php echo $toernooi['datum'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>