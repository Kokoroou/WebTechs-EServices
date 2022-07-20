<center>
<h1>UPDATE A BOOK</h1>
<form action="./librarian/updateBook2" method="post">
    <table border="2" align="center" cellpadding="5" cellspacing="5">
        <tr>
        <td> Title:</td>
        <td>
            <input list="titles" name="title" required>
            <datalist id="titles">
                <?php
                    for($i = 0; $i < count($titles); $i++){
                        echo "<option value='$titles[$i]'>";
                    }
                ?>
            </datalist>
        </td>
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