
<?php 
include_once("inc/global_config.php");

$recent_action = json_decode(file_get_contents($filename));
if ($recent_action->check != true) {
  $recent_action = new stdClass();
  $recent_action->first = true;
  $recent_action->check = true;
} else {
  $recent_action->first = false;
}

// only update if this value is available
if ($_REQUEST["verify"] == 686) {
  $recent_action->timestamp = time(); 
}
$action_json = json_encode($recent_action);
file_put_contents($filename, $action_json);

echo $action_json;




