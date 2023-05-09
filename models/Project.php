<?php
require_once '../../controllers/db.php';
class Project {
    private $id;
    private $name;
    private $customer_id;
    private $team_name;
    private $date;

    public function get_id(){
        return $this->id;
    }
    public function set_id($value){
        $this->id = $value;
    }

    public function get_name(){
        return $this->name;
    }
    public function set_name($value){
        $this->name = $value;
    }
    
    public function get_customer_id(){
        return $this->customer_id;
    }
    public function set_customer_id($value){
        $this->customer_id = $value;
    }
    
    public function get_team_name(){
        return $this->team_name;
    }
    public function set_team_name($value){
        $this->team_name = $value;
    }
    
    public function get_date(){
        return $this->date;
    }
    public function set_date($value){
        $this->date = $value;
    }
}
?>