
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devide-width, initial-scale=1.0">
    <Title>category</title>
</head>

<body>
    <h1>Category Administration </h1>
    <form method="POST" action="add.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td>CatID:</td>
                <td><input type="text" maxlength="20" name="CateID"></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td><input type="text" maxlength="100" name="Title"></td>
            </tr>
            <tr>
                <td>Descriptions:</td>
                <td><input type="text" maxlength="100" name="Descriptions"></td>
            </tr>
            <tr>
                <td><input type="submit" name="addcate" value="Add Category"></td>
            </tr>
        </table>
    </form>
</body>

</html>
<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $mydb = 'lab43';
    $table_name = 'Category';
    $connect = mysqli_connect($server, $user, $pass, $mydb);
    if (!$connect) {
        die("Connect fail to $server using $user");
    } else {
        include("add.php");
        include("menu.php");
    }
?>