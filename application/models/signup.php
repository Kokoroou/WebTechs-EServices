<?php
class Signup extends Model {
    protected $_model;

	function __construct() {
		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = "Signup";
		$this->_table1 = "user.user";
        $this->_table2 = "user.email_address";
        $this->_table3 = "user.member";
        $this->_table4 = "user.password";
	}

    function checkUserID($user_id) {
        $query = 'select * from `' . $this->_table1 . '` where user_id = ' . strval($user_id) . ';';

        if ($this->query($query)) return true;
        else return false;
    }

    function checkUsername($username) {
        $query = 'select * from `' . $this->_table1 . '` where account_name = "' . $username . '";';

        if ($this->query($query)) return true;
        else return false;
    }

    function addEmail($user_id, $email) {
        $date = date("Y-m-d");
        $query = 'insert into `' . $this->_table2 . '` values (' . $user_id . ', "' . $email . '", "' . $date . '");';

        return $this->query($query);
    }
    function addPassword($user_id, $password) {
        $date = date("Y-m-d");
        $query = 'insert into `' . $this->_table4 . '` values (' . $user_id . ', "' . $password . '", "", ' . $date . '");';

        return $this->query($query);
    }

    
// include 'config.php';
// error_reporting(0);

// session_start();

// if (isset($_SESSION['username'])) {
//     header("Location: index.php");
// }

// if (isset($_POST['submit'])) {
// 	$username = $_POST['username'];
// 	$email = $_POST['email'];
// 	$password = md5($_POST['password']);
// 	$cpassword = md5($_POST['cpassword']);

// 	if ($password == $cpassword) {
// 		$sql = "select * from `" . $this->_table2 . "` where email='" . $email . "'";
//         $this->query($sql);
// 		if (!$result->num_rows > 0) {
// 			$sql = "insert into `" . $this->_table2 . "` (user_id, email_address, modified_date)
// 					values ('" . $username"', '$email', '$password')";
// 			 $this->query($sql);
// 			if ($result) {
// 				echo "<script>alert('Wow! User Registration Completed.')</script>";
// 				$username = "";
// 				$email = "";
// 				$_POST['password'] = "";
// 				$_POST['cpassword'] = "";
// 			} else {
// 				echo "<script>alert('Woops! Something Wrong Went.')</script>";
// 			}
// 		} else {
// 			echo "<script>alert('Woops! Email Already Exists.')</script>";
// 		}
		
// 	} else {
// 		echo "<script>alert('Password Not Matched.')</script>";
// 	}
// }
}
?>