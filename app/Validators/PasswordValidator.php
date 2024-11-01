<?php

namespace App\Validators;

class PasswordValidator
{
  private $values;
  private $message_errors = [];

  public function __construct($values) {
    $this->values = $values;
    $this->validate();
  }

  public function validate() {
    if (!$this->values->name) {
      $this->message_errors['name'] = 'Поле обязательно к заполнению';
    }

    if (!$this->values->password) {
      $this->message_errors['password'] = 'Поле обязательно к заполнению';
    }
  }

  public function isValid() {
    return count($this->message_errors) === 0;
  }

  public function getMessageErrors() {
    return $this->message_errors;
  }
}
