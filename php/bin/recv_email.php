<?php
include_once("inc/global_config.php");
try {
  
  $input = file_get_contents("php://input");
  
  // verify hashtag
  if (stripos($input, $activityVerifyHashtag) !== false) {
    
    
    $recent_action = json_decode(file_get_contents($filename));
    if ($recent_action->check != true) {
      $recent_action = new stdClass();
      $recent_action->first = true;
      $recent_action->check = true;
    } else {
      $recent_action->first = false;
    }
    // TODO right before here we could store off the last one and write in a history.
    $recent_action->timestamp = time(); 
    
    $action_json = json_encode($recent_action);
    file_put_contents($filename, $action_json);
    
  } else {
    syslog(LOG_WARNING, "Unrecognized email", $input);
    file_put_contents("gs://$bucketName/debug/post.txt", json_encode($input));
  }
} catch(Exception $e) {
  syslog(LOG_WARNING, "Failed. ". $e->getMessage());
}
