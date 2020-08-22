<?php 

class UserValidator {
  private $data;
  private $errors = [];
  private static $fields = ['username', 'email'];

  public function __construct($post_data) 
  {
    $this->data = $post_data;
  }

  public function validate_form() {
    foreach(self::$fields as $field) {
      if(!array_key_exists($field, $this->data)) {
        trigger_error("$field is not present in data");
        return;
      }
    }
    $this->validate_username();
    $this->validate_email();

    return $this->errors;
  }

  private function validate_username() {
    $val = trim($this->data['username']);
    if(empty($val)) {
      $this->add_error('username', 'username can not be empty');
    }
    else if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val) ) {
      $this->add_error('username', 'Invalid username, must be alphanumeric & within 6-12 characters');
    }
  }

  private function validate_email() {
    $val = trim($this->data['email']);
    if(empty($val)) {
      $this->add_error('email', 'email can not be empty');
    }
    else if ( !filter_var($val, FILTER_VALIDATE_EMAIL) ) {
      $this->add_error('email', 'Invalid Email');
    }
  }  

  private function add_error($key, $val) {
    $this->errors[$key] = $val;
  }    

}