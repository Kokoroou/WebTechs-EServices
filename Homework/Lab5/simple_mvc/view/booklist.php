<html>  
<head>
    <title> Booklist </title>
    <style>
        a, td, th {
            color: #222222;
            font-family: georgia,times;
            font-size: 20px;
            font-weight: normal;
            line-height: 1.2em;
            color: black;
            text-decoration: none;
        }

        th {
            font-weight: bold;
        }

        a:hover {
            background-color: #BCFC3D;
        }

        h1 {
            color: #000000;
            font-size: 41px;
            letter-spacing: -2px;
            line-height: 1em;
            font-family: helvetica,arial,sans-serif;
            border-bottom: 1px dotted #cccccc;
            text-align: center;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>  
  
<body>  
    <h1>Booklist</h1>


    <table>  
        <tbody>
            <tr>
                <th style="width: 200px;">Title</th>
                <th style="width: 200px;">Author</th>
                <th style="width: 200px;">Description</th>
            </tr>
        </tbody>  
        <?php   
  
            foreach ($books as $title => $book)  
            {  
                echo '<tr><td><a href="index.php?book='.$book->title.'">'.$book->title.'</a></td><td>'.$book->author.'</td><td>'.$book->description.'</td></tr>';  
            }  
  
        ?>  
    </table>  
  
</body>  
</html>  

