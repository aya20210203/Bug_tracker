<?php
require_once '../../controllers/db.php';
class Emails {
    private $user_id;
    private $text;
    private $sender_email;

    public function get_user_id(){
        return $this->user_id;
    }
    public function set_user_id($value){
        $this->user_id = $value;
    }

    public function get_text(){
        return $this->text;
    }
    public function set_text($value){
        $this->text = $value;
    }
    
    public function get_sender_email(){
        return $this->sender_email;
    }
    public function set_sender_email($value){
        $this->sender_email = $value;
    }

    public function show_emails($user_id) // email
    {
        $db = DB::getInstance();
        return $db->select("select text, sender_email from email where user_id = $user_id"); 
    }
    public function user_id($username) // email
    {
        $db = DB::getInstance();
        $re = $db->select("select id from user where username = '$username'");
        while($row = $re->fetch_assoc()){
            $id = $row["id"];
        }
        return $id;
    } 
    public function send_email($username, $text, $sender) // email
    {
        $db = DB::getInstance();
        $user_id = $this->user_id($username);
        $db->insert("insert into email values($user_id, '$text', '$sender')"); 
    }    
}
?>