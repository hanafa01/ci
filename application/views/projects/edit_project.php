<h2>Edit Project</h2>

<?php $attributes = array('id' => 'create_form', 'class' => 'form_horizontal'); ?>

<?php echo validation_errors("<p class='bg-danger'>"); ?>

<div>
    <?php echo form_open('projects/edit/'.$project_data->id, $attributes);?>
    <div class="form-group">
        <?php echo form_label('Project Name'); ?>
        <?php $data = array('class' => 'form-control', 'name' => 'project_name', 'value' => $project_data->project_name); ?>
        <?php echo form_input($data); ?>
    </div>
    <div class="form-group">
        <?php echo form_label('Project Body'); ?>
        <?php $data = array('class' => 'form-control', 'name' => 'project_body', 'value' => $project_data->project_body); ?>
        <?php echo form_textarea($data); ?>
    </div>
    </div>
    <div class="form-group">
        <?php $data = array('class' => 'btn btn-primary', 'name' => 'submit', 'value' => 'Edit'); ?>
        <?php echo form_submit($data); ?>
    </div>
<?php echo form_close();?>
</div>