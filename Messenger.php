<?php

require_once __DIR__ . '/SendMessage/SendMessage.php';
require_once __DIR__ . '/Models/SentMessage.php';

abstract class Messenger{

  public static function send($message){
    $m = (object) $message;
    $record = new SentMessage();
    try{
      $record->setFields($m)->create();
      return new SendMessage($message);
    }catch(\Exception $e){
      throw new \Exception($e->getMessage());
    }
    return false;
  }
  public static function isSent($msg_name,$flag){
    return SentMessage::isSent($msg_name,$flag);
  }
  public static function getSent($id = null){
    if(is_null($id)){
      return SentMessage::getAll();
    }
    return new SentMessage($id);
  }
  public static function searchSent($key,$value){
    return SentMessage::search($key,$value);
  }
}
