<?php
use \google\appengine\api\mail\Message;

include_once("inc/global_config.php");

function sendSmsTrigger() {
  global $senderEmail;
  global $smsTriggerHashtag;
  $sms = new Message(); 
  $sms->setSender($senderEmail);
  $sms->addTo("trigger@ifttt.com");
  $sms->setSubject($smsTriggerHashtag);
  $sms->setTextBody("Meds not taken");
  $sms->send();
}

function sendBuzzTrigger() {
  global $senderEmail;
  global $buzzTriggerHashtag;
  $message = new Message();
  $message->setSender($senderEmail);
  $message->addTo("trigger@ifttt.com");
  $message->setSubject($buzzTriggerHashtag);
  $message->setTextBody("Yay");
  $message->send();
}