<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Note List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php include'partials/_header.php';?>

<?php
if($msg=$this->session->flashdata('noteadd')){
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success </strong>'.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
else if($msg=$this->session->flashdata('notedelete')){
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
else if($msg=$this->session->flashdata('noteupdate')){
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

<div class="container my-3">
    <h1>Add Notes</h1>
    <?php
      $value=$this->session->flashdata('notevalue');
      if($value)
      {
        $title=$note->note_title;
        $desc=$note->note_body;
        $userid=$note->user_id;
        $btn='Update';
        echo form_open('_datainput/update');
      }
      else 
      {
        $title='';
        $desc='';
        $userid='';
        $btn='Add Note';
        echo form_open('_datainput/index');
      }
      
      ?>
      
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <?php echo form_input(['class'=>'form-control', 'type'=>'text','id'=>'title','name'=>'title','value'=>set_value('note_title',$title)],'','required')?>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Discription</label>
        <?php echo form_textarea(['class'=>'form-control', 'type'=>'text','id'=>'desc','name'=>'desc','value'=>set_value('note_title',$desc)],'','required') ?>
    </div>

    <?php if($this->session->userdata('adminid')&& !$value){

    echo '<div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">User Id</label>';
         echo form_input(['class'=>'form-control', 'type'=>'text','id'=>'userid','name'=>'userid','value'=>set_value('user_id',$userid)],'','required');
    echo '</div>';}
    ?>

    <button class="btn btn-success"><?php echo $btn;?></button>
    <?php echo form_close();?>
</div>



 <div class="container"><h1>Notes</h1></div>


<div class="container my-3">
<div class="table text-center">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Sr.no</th>
      <?php 
        if($this->session->userdata('adminlogin') === true)
        {
          echo '<th scope="col">user id</th>';   
        } 
      ?>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">function</th>
    </tr>
  </thead>
  <tbody>
    
    <?php  
    if(count($notes))
    { 
        $srno=0;
        foreach($notes as $note)
        {
           $srno=$srno+1;
            echo'<tr>
                <th scope="row">'.$srno.'</th>';
                if($this->session->userdata('adminlogin') === true)
                {
                  echo '<td>'.$note->user_id.'</td>';
                  
                } 
                     echo '<td>'.$note->note_title.'</td>
                <td>'.$note->note_body.'</td>
                <td>';?>
                <?=  
                form_open('_datainput/editnote'),
                form_hidden('id',$note->id),
                form_submit(['name'=>'submit','value'=>'Edit','class'=>'btn btn-success']),
                form_close();
                 ?>
                </td>
                <td>
                 <?= form_open('_datainput/deletenote'),
                  form_hidden('id',$note->id),
                  form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
                  form_close();
                  ?>
               <?php echo'</td>
                </tr>';
        }
    }
    else echo'<h1>No data avilable</h1>';
    
    ?>

  </tbody>
</table>
</div>
  <?= $this->pagination->create_links();?>
</div>
<div class="container  py-5">
  <h1 class="d-none">.</h1>
</div>
<?php include'partials/_footer.php';?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>