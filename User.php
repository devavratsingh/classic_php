<?php 
require_once("Database.php"); 
class User {
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    // Now we want to check whether user with the same email address is available or not
    public function checkUserAvail($email){

        $uresult =mysqli_query($this->db->connection,"SELECT user_email FROM users WHERE user_email='$email'");
        return $uresult;
    }
    public function checkNumRows($email){
        if($this->checkUserAvail($email)){
            $num=mysqli_num_rows($this->checkUserAvail($email));
            return $num;
        }
    }

    // Now we want to register the user when he fill the form.
    public function registerUser($fname, $lname, $uname, $uemail, $upass){
        $date = $this->db->getDate();
        $regResult=mysqli_query(
            $this->db->connection,
            "INSERT INTO users(first_name,second_name,user_name,user_email, user_pass, user_created) VALUE('$fname','$lname','$uname','$uemail','$upass', '$date')"
        );
        if($regResult){
            return $regResult;
        } else {
            return  $this->db->mysqliError($this->db->connection);
        }
        
    }

    public function loginUser($uEmail, $uPass){
        $loginResult = mysqli_query(
            $this->db->connection,
            "SELECT id,first_name, second_name FROM users WHERE user_email='$uEmail' AND user_pass='$uPass'"
        );
        
        if($loginResult){
            return $loginResult;
        } else {
            return  $this->db->mysqliError($this->db->connection);
        }
    }

    public function getProfile($uid){
        $profileSection = mysqli_query(
            $this->db->connection,
            "SELECT * FROM users WHERE id='$uid'"
        );
        if($profileSection){
            return $profileSection;
        } else {
            return  $this->db->mysqliError($this->db->connection);
        }
    }

    public function updateProfilePassword($id, $newPass){
        $updateResult = mysqli_query(
            $this->db->connection,
            "UPDATE users SET user_pass='$newPass' WHERE id='$id'"
        );
        if($updateResult){
            return $updateResult;
        } else {
            return $this->db->mysqliError($this->db->connection);
        }
    }

    /*** starting the session ***/
    public function get_session(){
        if(isset($_SESSION['login'])){
            return $_SESSION['login'];
        }
        
    }

    public function logout() {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }

}
?>