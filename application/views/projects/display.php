<div class="col-md-9">
    <h1>Project Name: <?= $project_data->project_name; ?></h1>
    <p>Date Created: <?= $project_data->date_created; ?></p>
    <h3>Description:</h3>
    <p><?= $project_data->project_body; ?></p>


    <h3>Tasks</h3>
    <?php if($completed_tasks): ?>
            <ul>
                <?php foreach($completed_tasks as $task): ?>
                    <li><a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->task_id;?>"><?php echo $task->task_name; ?></a></li>
                <?php endforeach; ?>
            </ul>
    <?php else: ?>
        <p>You have not tasks pending.</p>
    <?php endif; ?>

</div>

<div class="col-md-3 float-right">
    <h6>Projects Acions</h6>
    <ul class="list-group">
        <li class="list-group-item"><a href="<?= base_url() ?>tasks/create/<?= $project_data->id ?>">Create Task</a></li>
        <li class="list-group-item"><a href="<?= base_url(); ?>projects/edit/<?= $project_data->id ?>">Edit Project</a></li>
        <li class="list-group-item"><a href="<?= base_url(); ?>projects/delete/<?= $project_data->id ?>">Delete Project</a></li>
    </ul>
</div>

<!-- Status 0: completed
Status 1: not completed, pending -->