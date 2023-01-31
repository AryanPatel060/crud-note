<?php 
class loginmodel extends CI_Model{

public function isvalidate($email,$pass)
{
    $hash= password_hash($pass, PASSWORD_DEFAULT);
    $query=$this->db->query("select * from users where user_email='$email' and password='$pass'");
    $result=$query->row();
    if($query->num_rows())
     { 
       return $result; 
     }
           else return false;
}

public function loginadmin($email,$pass)
    {
            $q=$this->db->query("SELECT * FROM `admins` WHERE admin_email='$email'and password='$pass'");
        return $q->row();
    }

} 