<?php
require_once 'user.php';
require_once 'Admin.php';
require_once '../../controllers/db.php';
class Developer extends user{
    // developer functions
    public function reassign_bug($developer_name, $bug_name) // developer
    { 
        $ad = new Admin;
        $ad->assign_bug($developer_name, $bug_name);
    }
    public function view_assigned_bugs($developer_id)  //developer
    {
        $db = DB::getInstance();
        return $db->select(" 
            select bug.id as bug_id, bug.name as bug_name, project.name as project_name, level.name as level, necessity, status.name as status 
            from bug  
            join project on bug.project_id = project.id
            join status on bug.status_id = status.id 
            join level on bug.level_id = level.id
            where bug.developer_id = $developer_id
            "); 
    }
    public function get_developer_unsolved_bugs($developer_id) //developer
    {
        $db = DB::getInstance();
        return $db->select(" 
            select name from bug 
            where developer_id = $developer_id and bug.status_id not in(3)
            "); 
    }
    public function get_start_date($bug_id) //db
    {
        $db = DB::getInstance();
        $re = $db->select("select start_time from bug where id = $bug_id");
        while($row = $re->fetch_assoc()){
            $start_time = $row["start_time"];
        }
        return $start_time;
    }
    public function send_solution($bug_name, $solution) //developer
    {
        $db = DB::getInstance();
        $ad = new Admin;
        $bg = new Bug;
        $bug_id = $ad->get_bug_id($bug_name); 
        $start_time = $this->get_start_date($bug_id);
        $end_time = gmdate('Y-m-d');
        $difference = strtotime($end_time)-strtotime($start_time);
        $solving_time = $difference/(24*60*60);
        if($solving_time < 0)
            {$solving_time = 0;}
        $db->insert("update bug set solution = '$solution', status_id = 3, end_time = '$end_time', solving_time = '$solving_time' where id = $bug_id"); 
        $bg->notify_bug_solved($bug_name); 
    }
    public function get_bug_details($id) //developer
    {
        $db = DB::getInstance();
        $re = $db->select("select details from bug where id = $id");
        while($row = $re->fetch_assoc()){
            $details = $row["details"];
        }
        return $details;
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
    public function get_developers()  // admin
    { 
        $db = DB::getInstance();
        return $db->select("select name from user where role_id = 2"); ; 
    }
    public function search_assigned_bugs($developer_id, $bug_name) //developer 
    {
        $db = DB::getInstance();
        return $db->select(" 
            select bug.id as bug_id, bug.name as bug_name, project.name as project_name, level.name as level, necessity, status.name as status 
            from bug  
            join project on bug.project_id = project.id
            join status on bug.status_id = status.id 
            join level on bug.level_id = level.id
            where bug.developer_id = $developer_id and bug.name like '%$bug_name%'
            "); 
    }
}
?>