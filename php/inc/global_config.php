<?php
require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;

// must define $senderEmail
// NOTE: must create this file. Not included in project
include_once("inc/private_config.php");


// must have created a default cloud storage bucket with the project. If not, enter a bucket name your project has access to
$bucketName = CloudStorageTools::getDefaultGoogleStorageBucketName();
$filename = "gs://$bucketName/simple_data/recent_action.json";

$activityVerifyHashtag = "#medstaken";
$smsTriggerHashtag = "#smswarn";
$buzzTriggerHashtag = "#buzz";
