<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $mydb = 'lab43';
    $table_name = 'Category';
    $connect = mysqli_connect($server, $user, $pass, $mydb);

    if(!$connect) {
        die ("Connect fail to $server using $user");
    } else {  
        $sql_menu = "SELECT * FROM Category";
        $row_menu = mysqli_query($connect, $sql_menu);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert table</title>
</head>
<body>
<form action="">
    <table style border=1;>
        <tr>
            <th>CateID</th>
            <th>Title</th>
            <th>Descriptions</th>
        </tr>
        <?php
            $i=0;
            while ($row = mysqli_fetch_array($row_menu, MYSQLI_ASSOC )){
            $i++;
            echo "<tr>";
            echo "<td>" . $row['CateID'] . "</td>";
            echo "<td>" . $row['Title'] . "</td>";
            echo "<td>" . $row['Descriptions'] . "</td>";
            echo "</tr>";
        }?>
    </table>
</form>
  