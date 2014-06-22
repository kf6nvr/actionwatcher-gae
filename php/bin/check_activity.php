<?php
include_once("inc/global_config.php");
include_once("inc/notify_helpers.php");

$recent_action = json_decode(file_get_contents($filename));
if ($recent_action->check == true) {
  $tzadjust = 60*60 * -4;
  $now = time()+$tzadjust;
  $whenTook = $recent_action->timestamp + $tzadjust;
  
  $noon = strtotime("noon", $now);
  if (strtotime("noon", $whenTook) == $noon) {
    $takenToday = true;
  } else {
    $takenToday = false;
  }
  
  $sinceNoon = $now - $noon;
  
  $leeway = 60*60;
  
  // NOTE: we stop warning after midnight; there will have been plenty before then
 // $takenToday = false;
  
  // if it's after noon 
  if ($now > $noon && $takenToday===false && $sinceNoon > $leeway) {
    sendBuzzTrigger();
    // also send sms
    sendSmsTrigger();
    
    
    
    echo "Notified. [$takenToday], lastTaken: [$recent_action->timestamp]";
    
  } else {
    echo "All is good. [$takenToday], when Took: [$recent_action->timestamp], adjust [$tzadjust]\n";
    echo "Now: [$now], Noon: [$noon]";
  }
  
  
}
