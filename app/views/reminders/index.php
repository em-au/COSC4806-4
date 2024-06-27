<?php require_once 'app/views/templates/header.php' ?>
<br>
<div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reminders</h1>
                <p><a href="/reminders/create_form">Create a new reminder</a></p>
                <p><a href="/reminders/completed_reminders">Previous reminders</a></p>
            </div>
        </div>
    </div>
    <table class="table align-middle table-bordered" style="width: 50%">
    <?php
        foreach($data['reminders'] as $reminder) { ?>
        <tr>
            <td align="left"><?php echo $reminder['subject']; ?></td>
            <td align="right" style="min-width: 300px;"> <!-- change to the right pixel size -->
                <a href="/reminders/update_form/?id=<?php echo $reminder['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                <a href="/reminders/complete/?id=<?php echo $reminder['id']; ?>"><button type="button" class="btn btn-success">Mark completed</button></a>
                <a href="/reminders/delete/?id=<?php echo $reminder['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        <? } ?>

    </table>                                             
</div>
<?php require_once 'app/views/templates/footer.php' ?>