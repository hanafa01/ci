<?php if($this->session->flashdata('login_success')): ?>
<div class="alert alert-success">
        <?php echo $this->session->flashdata('login_success'); ?>
</div>
<?php endif;?>

<?php if($this->session->flashdata('login_failed')): ?>
<div class="alert alert-danger">
        <?php echo $this->session->flashdata('login_failed'); ?>
</div>
<?php endif;?>

<h1>Hello from a view</h1>

