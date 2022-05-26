<?php
include_once "dao.php";
if (isset($_POST["btOK"])) {
    // form da duoc submit
    $cateID = $_POST["cateID"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $telephone = $_POST["telephone"];
    $url = $_POST["url"];
    createBiz($name, $address, $city,$telephone,$url,$cateID);
    header("location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Create new Biz</h2><br>
        <form action="" method="POST">
            <!-- Id : <br>
            <input type="text" name="id" id="id" readonly><br><br> -->
            Name : <br>
            <input type="text" name="name" id="name" required value=""><br><br>
            Address : <br>
            <input type="text" name="address" id="address" required value=""><br><br>
            City : <br>
            <input type="text" name="city" id="city" required value=""><br><br>
            Telephone : <br>
            <input type="text" name="telephone" id="telephone" required value=""><br><br>
            Url : <br>
            <input type="text" name="url" id="url" required value=""><br><br>
            CateID : <br>

            <select name="cateID" id="cateID">
                <?php 
                $ds = getCategoryList();
                foreach ($ds as $row) { ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row["category"] ?></option>";
                <?php
                }
                ?>
            </select><br><br>
            <input type="submit" value="Create Book" name="btOK" class="btn btn-info">
        </form>

    </div>
</body>

</html>