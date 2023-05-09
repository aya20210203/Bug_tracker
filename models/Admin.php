<?php
require_once 'user.php';
require_once 'Bug.php';
require_once '../../controllers/db.php';
class Admin extends user{
    // admin functions
    public function show_developers() // admin
    { 
        $db = DB::getInstance();
        return $db->select('select username, name, address, phone_number from user where role_id = 2');
    }
    public function add_developer($user_name, $name, $address, $phone_number) // admin
    { 
        $db = DB::getInstance();
        $db->insert("insert into user(username, name, address, phone_number, role_id) values('$user_name', '$name', '$address', '$phone_number', 2)");
    } 
    public function delete_developer($user)  //admin
    {  
        $db = DB::getInstance();
        $db->insert("delete from user where role_id = 2 and username = '$user'");  
    }  
    public function update_developer($user_name, $name, $address, $phone_number, $old) //admin
    { 
        $db = DB::getInstance();
        $db->insert("update user set username = '$user_name', name = '$name', address = '$address', phone_number = '$phone_number' where role_id = 2 and username = '$old'"); 
    }
    public function show_bug_case_flow() // admin
    { 
        $db = DB::getInstance();
        return $db->select(" 
            select bug.id as bug_id, bug.name as bug_name, project.name as project_name, status.name as status, level.name as level, bug.necessity, user.name as developer
            from bug  
            left join project on bug.project_id = project.id 
            left join status on bug.status_id = status.id 
            left join level on bug.level_id = level.id 
            left join user on bug.developer_id = user.id
            "); 
    } 
    public function project_bugs($project_name) // admin
    {
        $db = DB::getInstance();
        $resultSet = $db->select("
        select bug.name as bug_name
        from bug
        join project on project.id = bug.project_id
        where bug.status_id not in(3) and project.name = '$project_name'"); 
        $bugs = ""; 
        while($row = $resultSet->fetch_assoc()){
            $bugs.=$row["bug_name"];
            $bugs.=' - ';
        }
        return $bugs;
    }
    public function show_projects() // project
    { 
        $db = DB::getInstance();
        return $db->select(
            "select project.name as project_name, team_name , user.name as customer_name, project.date 
            from project join user 
            on project.customer_id = user.id"); 
        
    }
    public function get_customers()  // admin 
    { 
        $db = DB::getInstance(); 
        return $db->select("select name from user where role_id = 3"); 
    }
    public function get_user_id($name) // db
    {
        $db = DB::getInstance();
        $re = $db->select("select id from user where name = '$name'");
        while($row = $re->fetch_assoc()){
            $id = $row["id"];
        }
        return $id;
    }
    public function add_project($project_name, $team_name, $customer_name) // project
    {
        $db = DB::getInstance();
        $customer_id = $this->get_user_id($customer_name);
        $date = gmdate('Y-m-d');
        $db->insert("insert into project(name, team_name, customer_id, date) values('$project_name', '$team_name', '$customer_id', '$date')"); 
    }
    public function get_developers()  // admin
    { 
        $db = DB::getInstance();
        return $db->select("select name from user where role_id = 2"); ; 
    }
    public function get_bugs()  // admin
    { 
        $db = DB::getInstance();
        return $db->select("select name from bug where status_id not in(3)"); 
    }
    public function get_bug_id($name) // db
    {
        $db = DB::getInstance();
        $re =  $db->select("select id from bug where name = '$name'");
        while($row = $re->fetch_assoc()){
            $id = $row["id"];
        }
        return $id;
    }
    public function status_assigned($bug_name) // bug
    {
        $db = DB::getInstance();
        $db->insert("update bug set status_id = 2 where name = '$bug_name'");  
    }
    public function assign_bug($developer_name, $bug_name) // admin
    {
        $db = DB::getInstance();
        $bg = new Bug;
        $developer_id = $this->get_user_id($developer_name);
        $bug_id = $this->get_bug_id($bug_name);
        $db->insert("update bug set developer_id = $developer_id where id =$bug_id"); 
        $this->status_assigned($bug_name);
        $bg->notify_assigned_bug($developer_id, $bug_name);
    }
    public function search_projects($project_name) // project
    {
        $db = DB::getInstance();
        return $db->select(
            "select project.name as project_name, team_name , user.name as customer_name, project.date 
            from project join user 
            on project.customer_id = user.id
            where project.name like '%$project_name%'
            ");
    }
    public function search_admin_case_flow($bug_name) // admin
    {
        $db = DB::getInstance();
        return $db->select(" 
            select bug.id as bug_id, bug.name as bug_name, project.name as project_name, status.name as status, level.name as level, bug.necessity, user.name as developer 
            from bug  
            join project on bug.project_id = project.id 
            join status on bug.status_id = status.id 
            join level on bug.project_id = level.id 
            join user on bug.developer_id = user.id
            where user.role_id = 2 and bug.name like '%$bug_name%'
            ");
    }
    public function search_developers($developer_name) // admin
    {
        $db = DB::getInstance();
        return $db->select("select username, name, address, phone_number from user where role_id = 2 and name like '%$developer_name%'");  
    }
}
