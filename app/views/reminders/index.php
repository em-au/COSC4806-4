<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Reminders</h1>
                <p><a href="/reminders/create">Create a new reminder</a></p>
            </div>
        </div>
    </div>
    <table>
    <tr>
    <?php // shouldn't be php code?
    // maybe to a table and loop through the array and display as a list?
        // print_r($data['reminders']);
        foreach($data['reminders'] as $reminder) {
            // echo "<p>" . $reminder['subject'] . ' <a href="/reminders/update">update</a>
            //<a href="/reminders/delete">delete</a> </p>';
            echo "<td>" . $reminder['subject'] . "</td>";
            echo "<td><form method='post' action='/reminders/update_reminder'>
                    <button name='id' value='" . $reminder['id'] . "'>Edit</button>
            </form></td>";
        }
    ?>

<?php require_once 'app/views/templates/footer.php' ?>