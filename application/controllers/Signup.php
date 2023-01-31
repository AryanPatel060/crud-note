<?php
class Signup extends MY_controller{

    public function index(){

        $email=$this->input->post('signupEmail');
        $name=$this->input->post('username');
        $pass=$this->input->post('signuppassword');
        $cpass=$this->input->post('signupcpassword');

        $this->load->model('signupmodel');
        $checkemail=$this->signupmodel->isexist($email);
        $checkname=$this->signupmodel->existname($name);
        if($checkemail)
        {
        $this->session->set_flashdata('emailinuse','email is already in use');
        return redirect('Users/index');
        }
        else if($checkname)
        {
            $this->session->set_flashdata('nameinuse','username is already in use');
            return redirect('Users/index');
        }  
        else 
        {
            if($pass== $cpass)
            {
                $hash= password_hash($pass, PASSWORD_DEFAULT);
                $data=array(
                    'username' => $name,
                    'user_email' => $email,
                    'password' => $pass );
                $result= $this->signupmodel->signupuser($data);
                if($result) 
                {
                    $this->session->set_flashdata('signup_success','signup successfully, you can now log in');
                    return redirect('Users/index');
                }           
            }
            else{
                 $this->session->set_flashdata('passnotmatch','please make sure password and confirm password is same');
                 return redirect('Users/index');
            }
        
        }
       
    }
}
?>