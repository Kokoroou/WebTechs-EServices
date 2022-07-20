<style>
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
}
</style>
<center>
<h1>Welcome <?php echo $name ?></h1>
<a href='./librarian/enterBook'><button>ADD A BOOK</button></a>
<a href='./librarian/viewAllBooks'><button>VIEW ALL BOOKS</button></a>
<a href='./librarian/updateBook'><button>UPDATE BOOK</button></a>
<a href='./librarian/deleteBook'><button>DELETE BOOK</button></a>
</center>