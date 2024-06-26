<?php require_once 'app/views/templates/header.php'?>
<main role="main" class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; min-height: 80vh;">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Create a reminder</h1>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-sm-auto">
        <form action="/reminders/create_reminder" method="post" style="width: 300px;">
        <fieldset>
            <div class="form-group" style="text-align: left">
                <label for="subject">Description</label>
                <input required type="text" class="form-control" name="subject">
            </div>
            <br>
            <a href="/reminders"><button type="button" class="btn btn-light">Cancel</button></a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
        </form> 
  </div>
</div>
<br>

<?php require_once 'app/views/templates/footer.php' ?>

