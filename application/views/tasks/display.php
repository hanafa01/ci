<div class="col-md-9">
    <h1><?= $task->task_name; ?></h1>
    <p>Project Name: <?= $project_name; ?></p>
    <p>Created: <?= $task->date_created; ?></p>
    <p>Due on: <?= $task->due_date; ?></p>
    <h4>Description: </h4>
    <p class="task_description"><?= $task->task_body; ?></p>
</div>

<div class="col-md-3 float-right mt-2 mb-3">
    <h6>Tasks Actions</h6>
    <ul class="list-group">
        <li class="list-group-item"><a href="<?= base_url(); ?>tasks/edit/<?= $task->id; ?>">Edit</a></li>
        <li class="list-group-item"><a href="<?= base_url(); ?>tasks/delete/<?= $task->project_id; ?>/<?= $task->id; ?>">Delete</a></li>
        <li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/mark_complete/<?php echo $task->id; ?>">Mark Complete</a></li>
        <li class="list-group-item"><a href="<?php echo base_url(); ?>tasks/mark_incomplete/<?php echo $task->id; ?>">Mark Incomplete</a></li>
    </ul>
</div>