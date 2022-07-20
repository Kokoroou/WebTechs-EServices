<?php
class SignupController extends Controller {
    function view() {
        $this->set('title', 'signup');
        $this->set('description', 'List of book');

        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $cpassword = md5($_POST['cpassword']);
        
            if ($password == $cpassword) {
                if ($this->checkUsername($username)) {
                    echo "<script>alert('Woops! Username Already Exists.')</script>"
                } 
                else {
                    $user_id = 1;
                    
                }
            
                $sql = "select * from `" . $this->_table2 . "` where email='" . $email . "'";
                $this->query($sql);
                if (!$result->num_rows > 0) {
                    $sql = "insert into `" . $this->_table2 . "` (user_id, email_address, modified_date)
                            values ('" . $username"', '$email', '$password')";
                     $this->query($sql);
                    if ($result) {
                        echo "<script>alert('Wow! User Registration Completed.')</script>";
                        $username = "";
                        $email = "";
                        $_POST['password'] = "";
                        $_POST['cpassword'] = "";
                    } else {
                        echo "<script>alert('Woops! Something Wrong Went.')</script>";
                    }
                } else {
                    echo "<script>alert('Woops! Email Already Exists.')</script>";
                }
                
            } else {
                echo "<script>alert('Password Not Matched.')</script>";
            }
        }
}

}