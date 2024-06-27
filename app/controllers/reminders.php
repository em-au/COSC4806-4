<?php

class Reminders extends Controller {
  
  public function index() {
    $reminder = $this->model('Reminder');
    $reminders = $reminder->get_incomplete_reminders();
    $this->view('reminders/index', ['reminders' => $reminders]);
  }

  public function completed_reminders() {
    $reminder = $this->model('Reminder');
    $reminders = $reminder->get_completed_reminders();
    foreach($reminders as &$reminder) {
      $reminder['created_at'] = date('F j, Y H:m', strtotime($reminder['created_at']));
      $reminder['completed_at'] = date('F j, Y H:m', strtotime($reminder['completed_at']));
    }
    $this->view('reminders/completed', ['reminders' => $reminders]);
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

  public function update_form() {
    $id = $_GET['id'];
    $r = $this->model('Reminder');
    $reminder = $r->get_reminder_by_id($id);
    // Check if reminder exists and if it belongs to the user
    // TO DO - turn this into its own function and call it (since it's repeated multiple times)
    if (empty($reminder) || $reminder['user_id'] != $_SESSION['user_id']) {
      $_SESSION['reminder_error'] = 1;
      echo "error"; die; // TO DO: need to change this to display error in the view
    }

    $this->view('reminders/update', ['reminder' => $reminder]); // Pass the subject to prepopulate the form
  }

  public function update_reminder() { 
    $id = $_REQUEST['id'];
    $subject = $_REQUEST['subject'];
    $reminder = $this->model('Reminder');
    $reminder->edit_reminder($id, $subject);
    header('location: /reminders');
  }

  public function delete() { 
    $id = $_GET['id'];
    $r = $this->model('Reminder');
    $reminder = $r->get_reminder_by_id($id);                        
    // Check if reminder exists and if it belongs to the user
    if (empty($reminder) || $reminder['user_id'] != $_SESSION['user_id']) {
      $_SESSION['reminder_error'] = 1;
      echo "error"; die; // TO DO: need to change this to display error in the view
    }                       
    $r->mark_reminder_deleted($id);
    header('location: /reminders');                        
  }

  public function complete() {
    $id = $_GET['id'];
    $r = $this->model('Reminder');
    $reminder = $r->get_reminder_by_id($id);                        
    // Check if reminder exists and if it belongs to the user
    if (empty($reminder) || $reminder['user_id'] != $_SESSION['user_id']) {
      $_SESSION['reminder_error'] = 1;
      echo "error"; die; // TO DO: need to change this to display error in the view
    }                       
    $r->mark_reminder_completed($id);
    header('location: /reminders'); 
  }

}


?>