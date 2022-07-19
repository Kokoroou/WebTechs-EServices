<!DOCTYPE HTML>
<html>
<body>
    <?php
        // Required field names
        $required = array('isbn', 'title', 'author', 'category', 'publisher');
        // Loop over field names, make sure each one exists and is not empty
        $error = false;
        foreach($required as $field){
            if (empty($_POST[$field])){
              $error = true;
            }
        }
        if ($error){
            echo "<b>Book added unsuccessfully</b><br/>";
            echo "<b>All fields are required</b><br/>";
        }
        else{
            $isbn=$_POST["isbn"];
            $title=$_POST["title"];
            $author=$_POST["author"];
            $category=$_POST["category"];
            $publisher=$_POST["publisher"];

            echo "$isbn<br/>";
            echo "$title<br/>";
            echo "$author<br/>";
            echo "$category<br/>";
            echo "$publisher<br/>";
            // $query = "insert into book_info(isbn,title,author,edition,publication) values('$isbn','$title','$author','$edition','$publication')"; //Insert query to add book details into the book_info table
            // $result = mysqli_query($db,$query);
            echo "<b>Book added successfully<b><br/>";
        }
        echo "<a href='./librarian'><button>BACK TO HOME</button></a>";
        if ($error){
            echo "<a href='./librarian/enterBook'><button>RE-ADD BOOK</button></a>";
        }
        else{
            echo "<a href='./librarian/enterBook'><button>ADD ANOTHER BOOK</button></a>";
        }
    ?>
</body>
</html>