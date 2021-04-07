<h1>Task Display View</h1>

<table class="table">
    <thead>
        <tr>
            <th>Task Name</th>
            <th>Task Description</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="task-name">
                    <?= $task->task_name; ?>
                </div>
                <div class="task-actions">
                    <a href="<?= base_url(); ?>tasks/edit/<?= $task->id; ?>">Edit</a>
                    <a href="<?= base_url(); ?>tasks/delete/<?= $task->project_id; ?>/<?= $task->id; ?>">Delete</a>
                </div>
            </td>
            <td><?= $task->task_body; ?></td>
            <td><?= $task->date_created; ?></td>
        </tr>
    </tbody>
</table>