<?php

require_once __DIR__ . '/../Record/Record.php';

class SentMessage extends Record{

  const DB = '';
  const TABLE = '';
  const PRIMARYKEY = '';

  public $id;
  public $msg_name;
  public $to;
  public $subject;
  public $body;
  public $cc;
  public $bcc;
  public $attachements;
  public $flag;
  public $sent_by;
  public $created_date;

  public function __construct($id = null){
    parent::__construct(self::DB,self::TABLE,self::PRIMARYKEY,$id);
  }
}
