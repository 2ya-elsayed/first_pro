<?php
include'./connection.php';

if(isset($_GET['update'])){
    $id=$_GET['id'];
    $name = $_GET['name'];
    $email = $_GET['email'];
    $depId = $_GET['depId'];
    $update = "UPDATE `employee` SET `name`='$name',`email`='$email',`depId`='$depId' WHERE `id`=$id";
    mysqli_query($conn, $update);
    header("location:./employeeTable.php");
}
?>