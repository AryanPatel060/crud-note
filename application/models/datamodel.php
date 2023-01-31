<?php 
class datamodel extends CI_model{

public function addtonotes($title,$desc,$id)
{
    $data=array(
        'note_title' =>$title,
        'note_body' => $desc,
        'user_id' => $id
    );
  $q= $this->db->insert('notes',$data);
  if ($q)
  {
          return true;
  }
  else
  {
          return false;
  }
}

public function notelist($limit,$offset)
{
                $id=$this->session->userdata('id');
                $q=$this->db->select()
                        ->from('notes')
                        // ->order_by('id','desc')
                        ->where(['user_id'=>$id])
                        ->limit($limit,$offset)
                        ->get();
                return $q->result();
     
}

public function allnotes($limit,$offset)
{
        $q=$this->db->select()
                ->from('notes')
                ->limit($limit,$offset)
                ->get();
        return $q->result();
}

public function numrows()
{
        $id=$this->session->userdata('id');
        $q=$this->db->select()
                    ->from('notes')
                    ->where(['user_id'=>$id])
                    ->get();
        return $q->num_rows();
       
}

public function deletenote($id)
{
 $this->db->delete('notes',['id'=>$id]);
 return true;
}
public function fetchnote($id)
{
 $q = $this->db->select()
          ->from('notes')
          ->where(['id'=>$id])
          ->get();
          $this->session->set_userdata('editid',$id);
          return $q->row();
}

public function updatenote($title,$desc,$id)
{
       
  $this->db->query("UPDATE `notes` SET `note_title` = '$title', `note_body` = '$desc' WHERE `notes`.`id` = $id");

    if($this->session->userdata('adminid'))
        {
        return redirect('admin/welcome');
        }
        else return redirect('login/welcome');
}

} 