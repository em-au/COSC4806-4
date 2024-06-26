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
    $reminder = $this->model('Reminder');
    $subject = $reminder->get_subject_by_id($id);
    $this->view('reminders/update', ['subject' => $subject]); // Pass the subject to prepopulate the form
  }

  public function update_reminder($id) {
    $id = $_GET['id'];
    // send the subject 
  }
}


?>