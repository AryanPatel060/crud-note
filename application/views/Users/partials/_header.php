<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">CRUD NOTE</a>
       <div class="d-flex">
      <?php if($this->session->userdata('id') || $this->session->userdata('adminid')){?>
      <a href="<?= base_url('login/logout');?>" class="btn btn-success  mx-2">logout</a>
      <?php }?>
      </div>
  </div>
</nav>