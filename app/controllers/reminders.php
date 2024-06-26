<?php

class Reminders extends Controller {
  
  public function index() {
    $reminder = $this->model('Reminder');
    $reminders = $reminder->get_all_reminders();
    $this->view('reminders/index', ['reminders' => $reminders]);
  }

  public function create_form() {
    $this->view('reminders/create');
  }

  public function create_reminder() {
    $subject = $_REQUEST['subject'];
    $reminder = $this->model('Reminder');
    $reminder->add_reminder($subject);
    header('location: /reminders');
  }

  public function update_form($id) {
    $id = $_GET['id'];
    $r = $this->model('Reminder');
    $reminder = $r->get_reminder_by_id($id);
    $this->view('reminders/update', ['reminder' => $reminder]); // Pass the subject to prepopulate the form
  }

  public function update_reminder($id) {
    $id = $_REQUEST['id'];
    $subject = $_REQUEST['subject'];
    $reminder = $this->model('Reminder');
    $reminder->edit_reminder($id, $subject);
    header('location: /reminders');
  }
}


?>