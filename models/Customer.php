<?php
require_once 'user.php';
require_once 'Bug.php';
require_once '../../controllers/db.php';
class Customer extends user
{
    // customer functions
    public function view_bug_case_flow($customer_id) // customer
    {
        $db = DB::getInstance();
        return $db->select(" 
            select bug.id as bug_id, bug.name as bug_name, project.name as project_name, status.name as status, level.name as level, start_time, end_time, solving_time  
            from bug  
            join project on bug.project_id = project.id
            join status on bug.status_id = status.id 
            join level on bug.level_id = level.id 
            join user on project.customer_id = user.id
            where user.id = $customer_id
            order by bug.id
            "); 
    }   
    public function get_customer_projects($customer_id) // customer
    { 
        $db = DB::getInstance();
        return $db->select("select name from project where customer_id = $customer_id"); 
    }
    public function get_project_id($name) // db
    {
        $db = DB::getInstance();
        $re = $db->select("select id from project where name = '$name'");
        while($row = $re->fetch_assoc()){
            $id = $row["id"];
        }
        return $id;
    }
    public function get_level_id($name) //db
    {
        $db = DB::getInstance();
        $re =  $db->select("select id from level where name = '$name'");
        while($row = $re->fetch_assoc()){
            $id = $row["id"];
        }
        return $id;
    }
    public function get_admins() // customer
    { 
        $db = DB::getInstance();
        return $db->select("select id from user where role_id = 1"); 
    }

    public function add_bug($bug_name, $project_name, $necessity, $level_name, $details) // customer
    {
        $db = DB::getInstance();
        $bg = new Bug;
        $project_id = $this->get_project_id($project_name);
        $level_id = $this->get_level_id($level_name); 
        $db->insert("insert into bug(name, project_id, necessity, level_id, details) values('$bug_name', $project_id, $necessity, $level_id, '$details')"); 
        $bg->notify_new_bug($bug_name);
    }
    public function send_feedback($text, $sender) //customer
    {
        $db = DB::getInstance();
        $re = $this->get_admins();
        while ($row = $re->fetch_assoc()) {
            $user_id = $row["id"] ;
            $db->insert("insert into email values($user_id, '$text', '$sender')"); 
        }
    }
    public function get_developers_id() // customer
    { 
        $db = DB::getInstance();
        return $db->select("select id from user where role_id = 2"); 
    }
    public function contact($text, $sender) // customer 
    {
        $db = DB::getInstance();
        $re = $this->get_developers_id();
        while ($row = $re->fetch_assoc()) {
            $user_id = $row["id"] ;
            $db->insert("insert into email values($user_id, '$text', '$sender')"); 
        }
    }
    public function get_bug_solution($id) // customer
    {
        $db = DB::getInstance();
        $re =  $db->select("select solution from bug where id =$id");
        while($row = $re->fetch_assoc()){
            $solution = $row["solution"];
        }
        return $solution;
    }
    public function get_bug_name($id) //db
    {
        $db = DB::getInstance();
        $re = $db->select("select name from bug where id = $id");
        while($row = $re->fetch_assoc()){
            $details = $row["name"];
        }
        return $details;
    }
    public function search_customer($customer_id, $bug_name) // customer
    {
        $db = DB::getInstance();
        return $db->select(" 
            select bug.id as bug_id, bug.name as bug_name, project.name as project_name, status.name as status, level.name as level, start_time, end_time, solving_time  
            from bug  
            join project on bug.project_id = project.id
            join status on bug.status_id = status.id 
            join level on bug.level_id = level.id 
            join user on project.customer_id = user.id
            where user.id = $customer_id and bug.name like '%$bug_name%'
            ");
    }

}
?>