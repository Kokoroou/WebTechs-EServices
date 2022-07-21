<link rel="stylesheet" href="./public/css/booklist.css" type="text/css">

<?php
    if ($status == 0) {
        print '
        <center>
        <div class="form-container">
	        <div class="form-header">Delete Booklist</div>	
            <div class="form-data">
                <form id="main-form" method="post" name="delete-booklist" action="">
                    <table>
                        <tbody>
                            <tr>
                                <td class="key"><label for="booklist-name">Booklist Name:</label></td>
                                <td class="value">
									<select id="delete-booklist" name="booklist_id" class="booklist">';

		for ($i = 0; $i < count($booklist_ids); $i++) {
			$label = preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', $booklist_names[$i]);
			print '<option value="' . strval($booklist_ids[$i]) .  '">' . $label . '</option>';
		}

		print '
								</td>
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
                <div class="notice-data">Successfully delete booklist</div>
                <div class="button-container">
                    <a href="./booklist/delete"><button>Continue delete booklist</button></a>
                    <a href="./booklist"><button>Go to booklist</button></a>
                </div>
            </div>
        </center>
        ';
    }
?>