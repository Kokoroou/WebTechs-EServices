<html>  
<head>
    <title> <?php echo $book->title?> </title>
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
    <h1><?php echo $book->title?></h1>
    
    <table>
        <tr>
            <td><?php echo 'Author: ' . $book->author . '<br/>';?></td>
        </tr>
        <tr>
            <td><?php echo 'Description: ' . $book->description . '<br/>';?></td>
        </tr>
    </table>
</body>  
</html>  

