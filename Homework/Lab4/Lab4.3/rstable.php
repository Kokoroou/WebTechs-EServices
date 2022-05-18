<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <Title>category</title>
</head>

<body>
    <h1>Category Administration </h1>
    <?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $mydb = 'lab43';
    // Create connection
    $conn = new mysqli($server, $user, $pass);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql = "CREATE DATABASE lab43";
    if (!mysqli_connect($server, $user, $pass, $mydb)) {
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }
    }

    $conn->close();
    $table_name = 'Category';
    $connect = mysqli_connect($server, $user, $pass, $mydb);
    if (!$connect) {
        die("Connect fail to $server using $user");
    } else {
        $connect->query("DROP TABLE Category");
        if ($connect) {
            echo "Database created successfully";
        }
        $connect->close();
    }
    ?>
</body>

</html>