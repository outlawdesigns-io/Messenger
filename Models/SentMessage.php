<?php

require_once __DIR__ . '/../Record/Record.php';

class SentMessage extends Record{

  const DB = 'messages';
  const TABLE = 'sent';
  const PRIMARYKEY = 'id';

  public $id;
  public $msg_name;
  public $to = array();
  public $subject;
  public $body;
  public $cc = array();
  public $bcc = array();
  public $attachements = array();
  public $flag;
  public $sent_by;
  public $created_date;

  public function __construct($id = null){
    parent::__construct(self::DB,self::TABLE,self::PRIMARYKEY,$id);
  }
  public static function isSent($msg_name,$flag){
    $results = $GLOBALS['db']->database(self::DB)->table(self::TABLE)->select(self::PRIMARYKEY)->where("msg_name","=","'" . $msg_name . "'")->andWhere("flag","=","'" . $flag . "'")->get();
    if(!mysqli_num_rows($results)){
      return false;
    }
    return true;
  }
  public static function getAll(){
      $data = array();
      $ids = parent::getAll(self::DB,self::TABLE,self::PRIMARYKEY);
      foreach($ids as $id){
          $data[] = new self($id);
      }
      return $data;
  }
  public static function search($key,$value){
    $data = array();
    $ids = parent::search(self::DB,self::TABLE,self::PRIMARYKEY,$key,$value);
    foreach($ids as $id){
        $data[] = new self($id);
    }
    return $data;
  }
}
