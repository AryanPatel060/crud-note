
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= link_tag("Assets/css/bootstrap.css"); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php include'partials/_header.php';?>
  <?php
if($msg=$this->session->flashdata('emailinuse')){
         echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Error </strong>'.$msg.'
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
     }
else if($msg=$this->session->flashdata('emailinuse')){
  echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error </strong>'.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
else if($msg=$this->session->flashdata('nameinuse')){
  echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error </strong>'.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
else if($msg=$this->session->flashdata('signup_success')){
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success </strong>'.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
else if($msg=$this->session->flashdata('passnotmatch')){
  echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error </strong>'.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

<div class="container">
 <div class="">
    <h1 class="mx-5"><span>HEY,</span><br>LOGIN FOR ADD NOTES AND VIEW NOTES</h1>
 </div>
<p >
  <a class="btn btn-primary mx-5" data-bs-toggle="collapse" href="#login" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">login</a>
  
  <button class="btn btn-primary mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">signup</button>
  <a class="btn btn-primary mx-5" data-bs-toggle="collapse" href="#loginasadmin" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">login as admin</a>
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="login">
      <div class="card card-body">
     <?php echo form_open('login/index');?>
            <h1>Login</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="loginEmail" id="loginEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control"  id="loginpassword" name="loginpassword">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
     <?php echo form_open('signup/index');?>
     <h1> Signup</h1>
      <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupEmail1" name="signupEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label class="form-label">User Name</label>
          <input type="text" name="username" id="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="signuppassword" name="signuppassword">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="signupcpassword" name="signupcpassword">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="loginasadmin">
      <div class="card card-body">
     <?php echo form_open('admin/login');?>
            <h1>Login as admin</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="adminloginEmail" id="adminloginEmail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control"  id="adminloginpassword" name="adminloginpassword">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<?php include'partials/_footer.php';?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>