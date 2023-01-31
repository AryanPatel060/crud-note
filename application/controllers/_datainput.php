<?php
class _datainput extends MY_controller{

    public function index(){

        $title=$this->input->post('title');
        $desc=$this->input->post('desc');
        if($this->session->userdata('adminid'))
        {
           $id=$this->input->post('userid');
        }
        else $id=$this->session->userdata('id');

        $this->load->model('datamodel');
        $result=$this->datamodel->addtonotes($title,$desc,$id);

        if($result){
            $this->session->set_flashdata('noteadd','Note is added in list');
            if($this->session->userdata('adminid'))
            {
                return redirect('admin/welcome');
            }
            else return redirect('login/welcome');
        }
    }
    public function deletenote()
    {
       $id=$this->input->post('id');
       $this->load->model('datamodel');
       $result=$this->datamodel->deletenote($id);
       if($result){
        $this->session->set_flashdata('notedelete','Note is deleted successfully');
        if($this->session->userdata('adminid'))
        {
        return redirect('admin/welcome');
        }
        else return redirect('login/welcome');
    }
    }
    public function editnote()
    {
       $id=$this->input->post('id');
       $this->load->model('datamodel');
       $result=$this->datamodel->fetchnote($id);

       $evalue=$this->session->set_flashdata('notevalue',$result);
       if($this->session->userdata('adminid'))
        {
        return redirect('admin/welcome');
        }
        else return redirect('login/welcome');
    }

    public function update()
    {
        $title=$this->input->post('title');
        $desc=$this->input->post('desc');
         $id=$this->session->userdata('editid');
         $this->session->set_flashdata('noteupdate','Note is updated successfully');
        
        $this->load->model('datamodel');
        $this->datamodel->updatenote($title,$desc,$id);
    }


    }
?>