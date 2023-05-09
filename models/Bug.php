<?php
require_once '../../controllers/db.php';
require_once 'Customer.php';
class Bug {
    private $id;
    private $name;
    private $project_id;
    private $details;
    private $status_id;
    private $level_id;
    private $necessity;
    private $developer_id;
    private $start_time;
    private $end_time;
    private $solving_time;
    private $solution;

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

    public function get_project_id(){
        return $this->project_id;
    }
    public function set_project_id($value){
        $this->project_id = $value;
    }

    public function get_details(){
        return $this->details;
    }
    public function set_details($value){
        $this->details = $value;
    }

    public function get_status_id(){
        return $this->status_id;
    }
    public function set_status_id($value){
        $this->status_id = $value;
    }

    public function get_level_id(){
        return $this->level_id;
    }
    public function set_level_id($value){
        $this->level_id = $value;
    }

    public function get_necessity(){
        return $this->necessity;
    }
    public function set_necessity($value){
        $this->necessity = $value;
    }

    public function developer_id(){
        return $this->developer_id;
    }
    public function set_developer_id($value){
        $this->developer_id = $value;
    }

    public function get_start_time(){
        return $this->start_time;
    }
    public function set_start_time($value){
        $this->start_time = $value;
    }

    public function get_end_time(){
        return $this->end_time;
    }
    public function set_end_time($value){
        $this->end_time = $value;
    }

    public function get_solving_time(){
        return $this->solving_time;
    }
    public function set_solving_time($value){
        $this->solving_time = $value;
    }

    public function get_solution(){
        return $this->solution;
    }
    public function set_solution($value){
        $this->solution = $value;
    }

    public function notify_new_bug($bug_name) // customer
    {
        $db = DB::getInstance();
        $cus = new Customer;
        $text = $bug_name.' added!';
        $date = gmdate('Y-m-d');
        $re = $cus->get_admins();
        while ($row = $re->fetch_assoc()) {
            $admin_id = $row["id"] ;
            $db->insert("insert into notification values($admin_id, '$text', '$date')"); 
        }
    }
    public function notify_assigned_bug($developer_id, $bug_name)  // admin
    {
        $db = DB::getInstance();
        $text = $bug_name.' assigned to you!';
        $date = gmdate('Y-m-d');
        $db->insert("insert into notification values($developer_id, '$text', '$date')"); 
    }
    public function get_customer_of_bug($bug_name) //developer
    {
        $db = DB::getInstance();
        $re = $db->select("
        select user.id from user 
        join project on project.customer_id = user.id 
        join bug on bug.project_id = project.id 
        where bug.name = '$bug_name'");
        while($row = $re->fetch_assoc()){
            $id = $row["id"];
        }
        return $id;
    }
    public function notify_bug_solved($bug_name) //developer
    {
        $db = DB::getInstance();
        $text = $bug_name.' solved!';
        $date = gmdate('Y-m-d');
        $customer_id = $this->get_customer_of_bug($bug_name);
        $db->insert("insert into notification values($customer_id, '$text', '$date')"); 
    }
}
?>