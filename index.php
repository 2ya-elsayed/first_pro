<?php
include'./connection.php';

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
        <form action="./addEmployee.php" method="GET" class="mt-5">
            <div class="form-group">
                <label>Name</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" class="form-control">
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
                        <option value="<?php echo $id ?>"><?php echo $name ?></option>
                    <?php } ?>
                </select>
                <input name="add" class="btn btn-info mt-5" type="submit" value="Add Employee">
            </div>
        </form>
        <a href="./employeeTable.php" class="btn btn-info">Show Employees</a>
    </div>

    <script src="./js/popper.min.js"></script>
    <script src="./js/jquery.slim.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>