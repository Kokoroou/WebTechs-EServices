<?php

class Librarian extends Model {
    protected $_model;

    function __construct(){
        $this->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->_model = "Librarian";
    }

    function printNameByID($librarian_id){
        $query = 'select first_name from `user.librarian` where librarian_id = ' . $librarian_id . ';';
        $object = $this->query($query);

        $name = $object[0]["User.librarian"]["first_name"];

        return $name;
    }

    function selectAllBooks(){
        $query = 'select book_id, title from `book.book`;';
        $objects = $this->query($query);

        $book_ids = array();
		$book_titles = array();

        foreach($objects as $idx => $object){
            array_push($book_ids, $object["Book.book"]["book_id"]);
            array_push($book_titles, $object["Book.book"]["title"]);
        }

        return array($book_ids, $book_titles);
    }

    function selectAllCategories(){
        $query = 'select distinct name from `book.category`;';
        $objects = $this->query($query);

        $categories = array();

        foreach($objects as $idx => $object){
            array_push($categories, $object["Book.category"]["name"]);
        }

        return $categories;
    }

    function selectAllPublishers(){
        $query = 'select name from `book.publisher`;';
        $objects = $this->query($query);

        $publishers = array();

        foreach($objects as $idx => $object){
            array_push($publishers, $object["Book.publisher"]["name"]);
        }

        return $publishers;
    }

    function selectAllAuthors(){
        $query = 'select first_name from `book.author`;';
        $objects = $this->query($query);

        $authors = array();

        foreach($objects as $idx => $object){
            array_push($authors, $object["Book.author"]["first_name"]);
        }

        return $authors;
    }

    function selectAllBooksName(){
        $query = 'select title from `book.book`;';
        $objects = $this->query($query);

        $titles = array();

        foreach($objects as $idx => $object){
            array_push($titles, $object["Book.book"]["title"]);
        }

        return $titles;
    }

    function getBookByName($name){
        $query = 'select book_id from `book.book` where title = "' . $name . '";';
        $object = $this->query($query);

        var_dump($object);

        if ($object){
            echo "Not empty";
        }
        else{
            echo "Empty";
        }
    }

    function checkBookExisted($isbn, $title){
        $query1 = 'select book_id from `book.book` where isbn = "' . $isbn . '";';
        $query2 = 'select book_id from `book.book` where title = "' . $title . '";';
        $object1 = $this->query($query1);
        $object2 = $this->query($query2);

        if ($object1 || $object2){
            return true;
        }
        else{
            return false;
        }
    }

    function checkPublisherExisted($publisher){
        $query1 = 'select publisher_id from `book.publisher` where name = "' . $publisher . '";';
        $object1 = $this->query($query1);

        if ($object1){
            return $object1["Book.publisher"]["publisher_id"];
        }
        else{
            $query2 = 'select max(publisher_id) from `book.publisher`;';
            $object2 = $this->query($query2);
            $publisher_id = $object2[0][""]["max(publisher_id)"] + 1;

            $query3 = 'insert into `book.publisher` values (' . $publisher_id . ',' . $publisher . ');';
            $this->query($query3);
            
            return $publisher_id; 
        }
    }

    function addNewBook($isbn, $title, $author, $category, $publisher, $copies){
        $query1 = 'select max(book_id) from `book.book`;';
        $object1 = $this->query($query1);
        $book_id = $object1[0][""]["max(book_id)"] + 1;
        
        $publisher_id = $this->checkPublisherExisted($publisher);
        $query2 = 'insert into `book.book` values(' . $book_id . ',' . $isbn . ',' . $title . ',' . $publisher_id . ', curdate(), ' . $copies . ');';
        $this->query($query2);
    }
}
