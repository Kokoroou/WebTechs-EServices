<!DOCTYPE HTML>
<html>
<body>
    <center><h2>ADD A BOOK</h2></center>
    <!--Once the form is submitted, all the form data is forwarded to InsertBooks.php -->
    <form action="./librarian/insertBook" method="post">
 
        <table border="2" align="center" cellpadding="5" cellspacing="5">
            <tr>
            <td> Enter ISBN:</td>
            <td> <input type="text" name="isbn" size="48" placeholder="This field is required"> </td>
            </tr>
            <tr>
            <td> Enter Title:</td>
            <td> <input type="text" name="title" size="48" placeholder="This field is required"> </td>
            </tr>
            <tr>
            <td> Enter Author:</td>
            <td> <input type="text" name="author" size="48" placeholder="This field is required"> </td>
            </tr>
            <tr>
            <td> Enter Category:</td>
            <td> <input type="text" name="category" size="48" placeholder="This field is required"> </td>
            </tr>
            <tr>
            <td> Enter Publisher: </td>
            <td> <input type="text" name="publisher" size="48" placeholder="This field is required"> </td>
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