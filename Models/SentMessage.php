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
}
