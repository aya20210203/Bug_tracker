<?php
require_once '../../controllers/db.php';
class Notifications {
    private $user_id;
    private $text;
    private $date;

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
    
    public function get_date(){
        return $this->date;
    }
    public function set_date($value){
        $this->date = $value;
    }
    
    public function show_notifications($user_id) // notifications
    {
        $db = DB::getInstance();
        return $db->select("select date, text from notification where user_id = $user_id"); 
    }
}
?>
