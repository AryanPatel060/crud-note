<?php
 class admin extends MY_controller
 {
    public function login()
    {       
       $email= $this->input->post('adminloginEmail');
       $pass= $this->input->post('adminloginpassword');
         $this->load->model('loginmodel');
         $result= $this->loginmodel->loginadmin($email,$pass);
        if($result){
            $this->session->set_userdata('adminname',$result->admin_name);
            $this->session->set_userdata('adminid',$result->id);
            $this->session->set_userdata('adminlogin',true);


        }
        else  $this->session->set_userdata( $login=false);
        return redirect('admin/welcome');

    }

    public function welcome()
    {
        if(!$this->session->userdata('adminid'))
        return redirect('Users/index');
        $this->load->model('datamodel');
        // $notes=$this->datamodel->allnotes();
       $this->load->library('pagination');
       $config=[
        'base_url'=>base_url('admin/welcome'),
        'per_page'=>10,
        'total_rows'=> $this->datamodel->numrows(),      
       ];
       $config['first_link'] = false;        
       $config['last_link'] = false;        
       $config['full_tag_open'] = '<ul class="pagination">';        
    $config['full_tag_close'] = '</ul>';        
    $config['prev_link'] = 'Prev';        
    $config['prev_tag_open'] = '<li class="page-item "><span class="page-link ">';        
    $config['prev_tag_close'] = '</span></li>';        
    $config['next_link'] = 'Next';        
    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['next_tag_close'] = '</span></li>';        
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
    $config['cur_tag_close'] = '</a></li>';        
    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['num_tag_close'] = '</span></li>';
    

       $this->pagination->initialize($config);

       $notes=$this->datamodel->allnotes($config['per_page'],$this->uri->segment(3));

      $value=$this->session->flashdata('notevalue');
          $this->load->view('Users/note_list',['notes'=>$notes,'note'=> $value]);
        
    }
    
 }

?>