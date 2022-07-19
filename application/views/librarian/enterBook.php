<!DOCTYPE HTML>
<html>
<body>
    <center><h2>ADD A BOOK</h2></center>
    <center><h3>All fields are required</h3></center>
    <!--Once the form is submitted, all the form data is forwarded to InsertBooks.php -->
    <form action="./librarian/insertBook" method="post">
 
        <table border="2" align="center" cellpadding="5" cellspacing="5">
            <tr>
            <td> Enter ISBN:</td>
            <td> <input type="text" name="isbn"> </td>
            </tr>
            <tr>
            <td> Enter Title:</td>
            <td> <input type="text" name="title"> </td>
            </tr>
            <tr>
            <td> Enter Author:</td>
            <td>
                <input list="authors" name="author">
                <datalist id="authors">
                    <?php
                        for($i = 0; $i < count($authors); $i++){
                            echo "<option value='$authors[$i]'>";
                        }
                    ?>
                </datalist>
            </tr>
            <tr>
            <td> Choose Category:</td>
            <td>
                <select name="category">
                    <?php
                        for($i = 0; $i < count($categories); $i++){
                            echo "<option value='$categories[$i]'>$categories[$i]</option>";
                        }
                    ?>
                    <option value="Other" selected>Other</option>
                </select>
            </td>
            </tr>
            <tr>
            <td> Enter Publisher: </td>
            <td>
                <input list="publishers" name="publisher">
                <datalist id="publishers">
                    <?php
                        for($i = 0; $i < count($publishers); $i++){
                            echo "<option value='$publishers[$i]'>";
                        }
                    ?>
                </datalist>
            </tr>
            <tr>
            <td></td>
            <td>
            <input type="submit" value="ADD">
            <input type="reset" value="RESET">
            </td>
            </tr>
        </table>
    </form>
    <center><a href='./librarian'><button>BACK TO HOME</button></a></center>
</body>
</html>