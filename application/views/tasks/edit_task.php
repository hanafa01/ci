<h2>Edit Task</h2>

<?php $attributes = array('id' => 'edit_task_form', 'class' => 'form_horizontal'); ?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>

<div>
    <?php echo form_open('tasks/edit/'.$this->uri->segment(3).'', $attributes);?>
    <div class="form-group">
        <?php echo form_label('Task Name'); ?>
        <?php $data = array('class' => 'form-control', 'name' => 'task_name', 'placeholder' => 'Enter Task Name', 'value' => $task_info->task_name); ?>
        <?php echo form_input($data); ?>
    </div>
    <div class="form-group">
        <?php echo form_label('Task Body'); ?>
        <?php $data = array('class' => 'form-control', 'name' => 'task_body', 'placeholder' => 'Enter Task Body', 'value' => $task_info->task_body); ?>
        <?php echo form_textarea($data); ?>
    </div>
    <div class="form-group">
        <?php echo form_label('Due Date'); ?>
        <?php $data = array('class' => 'form-control', 'name' => 'due_date', 'type' => 'date', 'value' => $task_info->due_date) ?>
        <?php echo form_input($data); ?>
    </div>
    <div class="form-group">
        <?php $data = array('class' => 'btn btn-primary', 'name' => 'submit', 'value' => 'Update Task'); ?>
        <?php echo form_submit($data); ?>
    </div>
    <?php echo form_close();?>
</div>