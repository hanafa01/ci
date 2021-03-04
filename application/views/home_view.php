<?php if($this->session->flashdata('success_message')): ?>
<div class="alert alert-success">
        <?php echo $this->session->flashdata('success_message'); ?>
</div>
<?php endif;?>

<?php if($this->session->flashdata('error_message')): ?>
<div class="alert alert-danger">
        <?php echo $this->session->flashdata('error_message'); ?>
</div>
<?php endif;?>

<h1>Hello from a view</h1>

