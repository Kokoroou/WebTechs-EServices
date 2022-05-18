<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert table</title>
</head>
<body>
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
        if (isset($_POST['addcate'])) {
            $CateID = $_POST['CateID'];
            $Title = $_POST['Title'];
            $Descriptions = $_POST['Descriptions'];
            $SQLcmd = "INSERT INTO $table_name (CateID, Title, Descriptions) VALUES ('$CateID', '$Title', '$Descriptions')";
            $check = mysqli_query($connect, $SQLcmd);
            if($check != null){
                print "<p>Query: $SQLcmd</p>";
                print "<p>Insert succesfully into $table_name !</p>";
            } else {
                print "<p>Insert fail into $table_name !</p>";
            }
        }
        mysqli_close($connect);
    }
    ?>
</body>
</html>