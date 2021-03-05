<h1>Projects</h1>

<table class="table">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Project Name</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($projects as $project): ?>
        <tr>
            <td><a href="<?php echo base_url()?>projects/display/<?php echo $project->id?>"><?= $project->project_name ?></a></td>
            <td><?= $project->project_body ?></td>
        </tr>    
        <?php endforeach; ?>
    </tbody>
</table>