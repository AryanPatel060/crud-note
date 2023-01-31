<?php  
class login extends MY_controller{

    public function __construct()
    {
        parent::__construct();
        
    }
    public function index()
    {
       $email=$this->input->post('loginEmail');
       $pass=$this->input->post('loginpassword');
        $this->load->model('loginmodel');
       $result=$this->loginmodel->isvalidate($email,$pass);
       if($result)
       { 
            $id=$result->id;
            $name=$result->username;
            $this->session->set_userdata('id',$id);
            $this->session->set_userdata('username',$name);
            return redirect('login/welcome');
        }
        else{
            $this->session->set_flashdata('login_failed','Invalid Useranme/Password');
             return redirect('Users/index');
        }
    }
    public function welcome()
    {
        if(!$this->session->userdata('id') && !$this->session->usrdata('adminid'))
        return redirect('Users/index');
        
        $this->load->model('datamodel');
        // $notes=$this->datamodel->notelist();
       $this->load->library('pagination');
       $config=[
        'base_url'=>base_url('login/welcome'),
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

       $notes=$this->datamodel->notelist($config['per_page'],$this->uri->segment(3));

      $value=$this->session->flashdata('notevalue');
          $this->load->view('Users/note_list',['notes'=>$notes,'note'=> $value]);
      
          
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('adminid');
        $this->session->unset_userdata('adminname');
        $this->session->unset_userdata('adminlogin');

       return redirect('Users/index');
    }
  }
?>
