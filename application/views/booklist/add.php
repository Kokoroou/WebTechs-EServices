<link rel="stylesheet" href="./public/css/booklist.css" type="text/css">

<?php
    if ($status == 0) {
        print '
        <center>
        <div class="form-container">
	        <div class="form-header">Add Booklist</div>	
            <div class="form-data">
                <form id="main-form" method="post" name="add-booklist" action="">
                    <table>
                        <tbody>
                            <tr>
                                <td class="key"><label for="booklist-name">Booklist Name:</label></td>
                                <td class="value"><input type="text" id="booklist-name" name="name"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>		
            <div class="form-submit">
                <input type="submit" form="main-form" value="Submit">
            </div>
        </div>
        </center>
        ';
    }
    elseif ($status == 1) {
        print '
        <center>
            <div class="notice-container">
                <div class="notice-data">Successfully add booklist</div>
                <div class="button-container">
                    <a href="./booklist/add"><button>Continue add booklist</button></a>
                    <a href="./booklist"><button>Go to booklist</button></a>
                </div>
            </div>
        </center>
        ';
    }
?>