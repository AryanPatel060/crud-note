<?php
 class signupmodel extends CI_model{

   public function isexist($email)
   {
       $query=$this->db->query("select user_email from users where user_email='$email'");
       $result=$query->num_rows();
       if($result>0 ) return true;
              else return false;
    }
    public function existname($name)
    {
        $qname=$this->db->query("select username from users where username ='$name'");
        $rname=$qname->num_rows();
            
            if($rname>0) return true;
            else   return false;
    }
   
   public function signupuser($data)
   {
        $q= $this->db->insert('users',$data);
        if ($q) return true;
        else  return false;
    }

 }
?>
