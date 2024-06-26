<?php require_once 'app/views/templates/header.php' ?>
<br>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reminders</h1>
                <p><a href="/reminders/create_form">Create a new reminder</a></p>
            </div>
        </div>
    </div>
    <table class="table align-middle" style="width: 50%">
    <?php
        foreach($data['reminders'] as $reminder) { ?>
        <tr>
            <td><?php echo $reminder['subject']; ?></td>
            <td align="right">
                <a href="/reminders/update_form/?id=<?php echo $reminder['id']; ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                <a href="/reminders/delete/?id=<?php echo $reminder['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        <? } ?>

    </table>
                                                  

<?php require_once 'app/views/templates/footer.php' ?>