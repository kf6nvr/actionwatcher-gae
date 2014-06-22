<?php
require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;

// must define $senderEmail
include_once("inc/private_config.php");

$bucketName = CloudStorageTools::getDefaultGoogleStorageBucketName();
$filename = "gs://$bucketName/simple_data/recent_action.json";

$activityVerifyHashtag = "#medstaken";
$smsTriggerHashtag = "#smswarn";
$buzzTriggerHashtag = "#buzz";
