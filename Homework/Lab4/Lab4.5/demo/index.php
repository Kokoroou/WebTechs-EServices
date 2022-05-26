<?php
include_once "dao.php";

//kiem tra nut [search] duoc bam chua
if (isset($_GET["btOK"])) {
    $cateID = $_GET["getID"];
    if($scateID ==null){
        $ds= getBizList ();
    } else {
    $ds = getBizListByCategory($cateID);
    }
} else {
    $ds = getBizList();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Biz List</h2>
        <hr>
        <a href="create.php">Create new Biz</a><br><br>
        <form action="" method="GET" id="" name="">
            <select name="getID" id="getID">
                <option value="">--- select option ---</option>
                <?php
                $list = getCategoryList();
                foreach ($list as $cate) { ?>
                    <option value="<?php echo $cate['id'] ?>"><?php echo $cate['category'] ?></option>
                <?php
                }
                ?>
            </select>
            <input type="submit" value="Find" name="btOK">
        </form>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>name</th>
                    <th>address</th>
                    <th>city</th>
                    <th>telephone</th>
                    <th>url</th>
                    <th>cateID</th>
                </tr>
            </thead>
            <tbody id="biz-data">
                <?php
                foreach ($ds as $row) {
                    echo "<tr>";
                    echo "<td> {$row['id']} </td>";
                    echo "<td> {$row['name']} </td>";
                    echo "<td>" . $row["address"] . " </td>";
                    echo "<td>" . $row["city"] . " </td>";
                    echo "<td>" . $row["telephone"] . " </td>";
                    echo "<td>" . $row["url"] . " </td>";
                    echo "<td>" . $row["cateID"] . " </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>