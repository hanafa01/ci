<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <title>CI</title>
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <?php $this->load->view($main_view); ?>
        </div>
    </div>
</div>

<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</body>
</html>