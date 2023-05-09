<?php
require_once '../../controllers/db.php';
abstract class user{
    private $id;
    private $username;
    private $password;
    private $name;
    private $address;
    private $phonenumber;

    public function get_id(){
        return $this->id;
    }
    public function set_id($value){
        $this->id = $value;
    } 

    public function get_username(){
        return $this->username;
    }
    public function set_username($value){
        $this->username = $value;
    }
    
    public function get_password(){
        return $this->password;
    }
    public function set_password($value){
        $this->password = $value;
    }

    public function get_name(){
        return $this->name;
    }
    public function set_name($value){
        $this->name = $value;
    }
    
    public function get_address(){
        return $this->address;
    }
    public function set_address($value){
        $this->address = $value;
    }
    
    public function get_phonenumber(){
        return $this->phonenumber;
    }
    public function set_phonenumber($value){
        $this->phonenumber = $value;
    }
    
    public function login($username, $password)
    {
        $db = DB::getInstance();
        $result = $db->select("SELECT * FROM user WHERE username='$username' AND password='$password' ");             
                $row = mysqli_fetch_assoc($result);
                if(is_array($row) && !empty($row)){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['phone_number'] = $row['phone_number'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['address'] = $row['address'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['role_id'] = $row['role_id'];
                    // header('location: ../../views/registeration/profile.php');
                }else{
                    echo "<div class='message'>
                    <p>Wrong Username or Password</p>
                    </div> <br>";
                echo "<a href='../../views/registeration/index.php'><button class='btn'>Go Back</button>";
                }
                if(isset($_SESSION['username'])){
                    if($_SESSION['role_id'] == 1){header("Location: ../../views/Admin/index.php");}
                    else if($_SESSION['role_id'] == 2){header("Location: ../../views/developer/index.php");}
                    else if($_SESSION['role_id'] == 3){header("Location: ../../views/Customer/addbug.php");}
                }
    }
    public function logout()
    {
        Session_start();
        Session_destroy();
        header('Location: ../../views/index.php');
    }
}
?>