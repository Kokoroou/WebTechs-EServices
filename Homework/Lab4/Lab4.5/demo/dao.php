<?php
include_once "biz.php";

function getBizList(){
    $cn = connectDB(); 

    $sql = "select * from biz";
    $result = mysqli_query($cn, $sql);

    if ($result == false) {
        die("<h3>Not Found !<h3>");
    }

    $a = array();

    while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $a[] = $sv;
    }

    disconnectDB($cn);
    return $a;
}

function createBbiz($name, $address, $city,$telephone,$url,$cateID){
    $cn = connectDB();

    $sql = "INSERT INTO `biz` (`id`,`name`, `address`, `city`,`telephone`,`url`,`cateID`) 
    VALUES (NULL,'$name', '$address' ,'$city','$telephone','$url', '$cateID')";

    $result = mysqli_query($cn, $sql);
    disconnectDB($cn);

    return $result;
}

function getBizByCategory($cateID){
    $cn = connectDB(); 

    $sql = "select * from biz where cateID='$cateID'";
    $result = mysqli_query($cn, $sql);

    if ($result == false) {
        die("<h3>Not Found !<h3>");
    }

    $a = array();

    while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $a[] = $sv;
    }

    disconnectDB($cn);
    return $a;
}

function getCategoryList(){
    $cn = connectDB(); 

    $sql = "select * from category";
    $result = mysqli_query($cn, $sql);

    if ($result == false) {
        die("<h3>Not Found !<h3>");
    }

    $a = array();

    while ($sv = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $a[] = $sv;
    }

    disconnectDB($cn);
    return $a;
}