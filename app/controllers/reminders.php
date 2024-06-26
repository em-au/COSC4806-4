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
    // Check if reminder exists and if it belongs to the user
    if (empty($reminder) || $reminder['user_id'] != $_SESSION['user_id']) {
      $_SESSION['reminder_error'] = 1;
      echo "error"; die; // TO DO: need to change this to display error in the view
    }

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