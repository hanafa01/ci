    <?php if($success_message): ?>
    <div class="alert alert-success">
            <?php echo $success_message; ?>
    </div>
    <?php endif;?>

    <?php if($error_message): ?>
    <div class="alert alert-danger">
            <?php echo $error_message; ?>
    </div>
    <?php endif;?>