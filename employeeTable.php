<?php
include'./connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container">
        <table class="table mt-5 text-light">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Department</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select = "SELECT employee.id empid, employee.name empname, employee.email empemail, departments.name depname
                            FROM employee INNER JOIN departments on employee.depid=departments.id";
                $result = mysqli_query($conn, $select);
                foreach ($result as $employee) {
                    $id = $employee['empid'];
                    $name = $employee['empname'];
                    $email = $employee['empemail'];
                    $department = $employee['depname'];
                ?>
                    <tr>
                        <th scope="row"><?php echo $id ?></th>
                        <td><?php echo $name ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $department ?></td>
                        <td><a href="editEmployee.php?edit=<?php echo $id ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="delete.php?delete=<?php echo $id ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="./index.php" class="btn btn-info">Add Employee</a>
    </div>
</body>
</html>