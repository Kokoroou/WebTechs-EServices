<center>
<h1>UPDATE BOOK</h1>
<form action="./librarian/insertBook" method="post">
    <table border="2" align="center" cellpadding="5" cellspacing="5">
        <tr>
        <td> ISBN:</td>
        <td> <input type="text" name="isbn" placeholder="This field is required"> </td>
        </tr>
        <tr>
        <td> Title:</td>
        <td> <input type="text" name="title" valueplaceholder="This field is required"> </td>
        </tr>
        <tr>
        <td> Author:</td>
        <td>
            <input list="authors" name="author" placeholder="This field is required">
            <datalist id="authors">
                <?php
                    for($i = 0; $i < count($authors); $i++){
                        echo "<option value='$authors[$i]'>";
                    }
                ?>
            </datalist>
        </tr>
        <tr>
        <td> Category:</td>
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
        <td> Publisher: </td>
        <td>
            <input list="publishers" name="publisher" placeholder="This field is required">
            <datalist id="publishers">
                <?php
                    for($i = 0; $i < count($publishers); $i++){
                        echo "<option value='$publishers[$i]'>";
                    }
                ?>
            </datalist>
        </td>
        </tr>
        <tr>
        <td></td>
        <td>
        <input type="submit" value="UPDATE">
        <input type="reset" value="RESET">
        </td>
        </tr>
    </table>
</form>
<a href='./librarian'><button>BACK TO HOME</button></a>
</center>