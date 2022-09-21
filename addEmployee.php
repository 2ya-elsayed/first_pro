<?php
include'./connection.php';

if (isset($_GET['add'])) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $depId = $_GET['depId'];
    $insert = "INSERT INTO `employee`(`id`, `name`, `email`, `depId`) VALUES (null,'$name','$email','$depId')";
    mysqli_query($conn, $insert);
    header("location:employeeTable.php");
}
?>
