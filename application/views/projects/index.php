<h1>Projects</h1>

<?php echo checkFlash(); ?>

<div class="float-right">
    <a href="<?php echo base_url(); ?>projects/create" class="btn btn-primary">Create</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Project Body</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($projects as $project): ?>
        <tr>
            <td><a href="<?php echo base_url()?>projects/display/<?php echo $project->id?>"><?= $project->project_name ?></a></td>
            <td><?= $project->project_body ?></td>
            <td><a href="<?= base_url(); ?>projects/delete/<?= $project->id ?>"><span class="btn btn-danger close text-white" aria-hidden="true">&times;</span></a></td>
        </tr>    
        <?php endforeach; ?>
    </tbody>
</table>