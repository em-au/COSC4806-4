<?php

class Reminder {

  public function __construct() {

  }

  public function get_all_reminders() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM reminders;");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function add_reminder($subject) {
    $db = db_connect();
    $statement = $db->prepare("INSERT INTO reminders (user_id, subject) VALUES (:user_id, :subject)");
    $statement->bindParam(':user_id', $_SESSION['user_id']);
    $statement->bindParam(':subject', $subject);
    $statement->execute();
  }
  
  public function update_reminder($reminder_id) {
    $db = db_connect();
    // do update statement
  }

}
?>