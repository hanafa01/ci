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
<div class="jumbotron">
        <h2 class="text-center">Welcome To The App!</h2>
</div>

<?php if(isset($my_projects)):?>
<h1>Projects</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Project Body</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($my_projects as $project): ?>
        <tr>
            <td><?= $project->project_name ?></td>
            <td><?= $project->project_body ?></td>
            <td><a href="<?= base_url(); ?>projects/display/<?php echo $project->id ?>">View</a></td>
        </tr>    
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>

<?php if(isset($my_tasks)):?>
<h1>Tasks</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Task Name</th>
            <th>Task Body</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($my_tasks as $task): ?>
        <tr>
            <td><?= $task->task_name ?></td>
            <td><?= $task->task_body ?></td>
            <td><a href="<?= base_url(); ?>tasks/display/<?php echo $task->id ?>">View</a></td>
        </tr>    
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
