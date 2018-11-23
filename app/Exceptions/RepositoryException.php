<?php

namespace App\Exceptions;

class RepositoryException extends Exception
{
  public function __construct($message)
  {
    parent::message = $message;
    Handler::report($this);
  }
}