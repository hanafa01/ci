<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/webshim-1.16.0/js-webshim/minified/polyfiller.js">
    <title>CI</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= base_url(); ?>">CI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url(); ?>">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>projects/index">PROJECTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>products/index">PRODUCTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>users/register">REGISTER</a>
      </li>
    </ul>
    <?php if($this->session->userdata('logged_in')): ?>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url(); ?>users/logout">Logout</a>
      </li>
    </ul>
    <?php endif; ?>
  </div>
</nav>
 
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <?php $this->load->view('users/login_view');?>
      </div>
      <div class="col-md-8">
        <?php $this->load->view($main_view); ?> 
      </div>
    </div>
</div>

<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<script>
function updateCartQty(value, cartid){
  $.ajax({
    url: "<?php echo base_url(); ?>cart/updateItemQty",
    method: 'POST',
    data: {qty: value.value, cartid:cartid}, 
    success: function(result){
      if(result){
        location.reload();
      }else{
        alert('error');
      }
      // console.log(result);
    }
  });
}


</script>
</body>
</html>