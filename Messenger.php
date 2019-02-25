<?php

require_once __DIR__ . '/SendMessage/SendMessage.php';

abstract class Messenger{

  public static function send($message){
    return new SendMessage($message);
  }
}
