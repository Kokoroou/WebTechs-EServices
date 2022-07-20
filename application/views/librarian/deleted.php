<!DOCTYPE HTML>
<html>
<body>
    <?php
        if ($error){
            echo "<center>";
            echo "<b>Your required book doesn't exist.</b><br/>";
            echo "</center>";
        }
        else{
            $title=$_POST["title"];
            
            echo "<center>";
            echo "$title<br/>";
            echo "</center>";
            // $query = "insert into book_info(isbn,title,author,edition,publication) values('$isbn','$title','$author','$edition','$publication')"; //Insert query to add book details into the book_info table
            // $result = mysqli_query($db,$query);
            echo "<center>";
            echo "<b>Book deleted successfully<b><br/>";
            echo "</center>";
        }
        echo "<center>";
        echo "<a href='./librarian'><button>BACK TO HOME</button></a>";
        if ($error){
            echo "<a href='./librarian/deleteBook'><button>RE-DELETE BOOK</button></a>";
        }
        else{
            echo "<a href='./librarian/deleteBook'><button>DELETE ANOTHER BOOK</button></a>";
        }
        echo "</center>";
    ?>
</body>
</html>