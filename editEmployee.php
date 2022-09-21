<?php
include'./connection.php';

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $select = "SELECT employee.id empid, employee.name empname, employee.email empemail, departments.name depname, departments.id depid
            FROM employee INNER JOIN departments ON employee.depid=departments.id AND employee.id = $id;";
    $result = mysqli_query($conn, $select);
    $row= $result->fetch_assoc();
    $name = $row['empname'];
    $email = $row['empemail'];
    $dep = $row['depname'];
    $depid = $row['depid'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body class="bg-dark text-light">
    <div class="container col-lg-6">
        <form action="./edit.php" method="GET" class="mt-5">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control" value="<?php echo $name ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label>Department</label>
                <select name="depId" class="form-control">
                    <?php
                    $select = "SELECT * FROM departments";
                    $result = mysqli_query($conn, $select);
                    foreach ($result as $data) {
                        $id = $data['id'];
                        $name = $data['name'];
                    ?>
                        <option value="<?php echo $id ?>" <?php if($id==$depid){echo "selected";} ?>><?php echo $name ?></option>
                    <?php } ?>
                </select>
                <input name="update" class="btn btn-info mt-5" type="submit" value="Update Employee">
            </div>
        </form>
    </div>

    <script src="./js/popper.min.js"></script>
    <script src="./js/jquery.slim.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>