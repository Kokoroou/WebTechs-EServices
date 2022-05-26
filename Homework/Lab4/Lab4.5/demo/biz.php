<?php 

function connectDB(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "demo";

    //
    $cn = mysqli_connect($host, $user, $password, $dbname) or die("Can not connect to Database Server !!!");

    return $cn;
}

    function disconnectDB($cn){
        mysqli_close($cn);
        // $cn -> close();
    }
?>