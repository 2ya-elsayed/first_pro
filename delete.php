<?php
include'./connection.php';
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $del = "DELETE FROM `employee` WHERE `id` = $id";
    mysqli_query($conn,$del);
    header("location:employeeTable.php");
}
?>