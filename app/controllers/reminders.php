<?php

class Reminders extends Controller {
  
  public function index() {
    $reminder = $this->model('Reminder');
    $reminders = $reminder->get_all_reminders();
    $this->view('reminders/index', ['reminders' => $reminders]);
  }

  public function create() {
    $this->view('reminders/create');
  }

  public function add_reminder() {
    $reminder = $this->model('Reminder');
    // need a form (will look like user signup, just need subject)
    // need user_id from table as a session variable so that you can add it to the reminders
  }
}


?>