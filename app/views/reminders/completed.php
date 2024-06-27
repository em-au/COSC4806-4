<?php require_once 'app/views/templates/header.php' ?>
<br>
<div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reminders</h1>
                <p><a href="/reminders/index">Go to back to current reminders</a></p>
            </div>
        </div>
    </div>
    <table class="table align-middle table-bordered">
        <tr>
            <th>Reminder</th>
            <th>Created</th>
            <th>Completed</th>
        </tr>
    <?php
        foreach($data['reminders'] as $reminder) { ?>
        <tr>
            <td><?php echo $reminder['subject']; ?></td>
            <td><?php echo $reminder['created_at']; ?></td>
            <td><?php echo $reminder['completed_at']; ?></td>
        </tr>
        <? } ?>

    </table>                                             
</div>
<?php require_once 'app/views/templates/footer.php' ?>