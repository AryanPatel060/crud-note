<?php
class Users extends MY_controller{
public function index(){
    if($this->session->userdata('id')) 
    {
        return redirect('login/welcome');
    }
    else if($this->session->userdata('adminid'))
    {
        return redirect('admin/welcome');
    }
    else 
     $this->load->view('Users/landing.php');
}
}
?>