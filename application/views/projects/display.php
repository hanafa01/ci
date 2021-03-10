<div class="col-md-9">
    <h1>Project Name: <?= $project_data->project_name; ?></h1>
    <p>Date Created: <?= $project_data->date_created; ?></p>
    <h3>Description:</h3>
    <p><?= $project_data->project_body; ?></p>
</div>

<div class="col-md-3 float-right">
    <h6>Projects Acions</h6>
    <ul class="list-group">
        <li class="list-group-item"><a href="<?= base_url() ?>tasks/create/<?= $project_data->id ?>">Create Task</a></li>
        <li class="list-group-item"><a href="<?= base_url(); ?>projects/edit/<?= $project_data->id ?>">Edit Project</a></li>
        <li class="list-group-item"><a href="<?= base_url(); ?>projects/delete/<?= $project_data->id ?>">Delete Project</a></li>
    </ul>
</div>