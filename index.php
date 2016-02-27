<?php
require "database.php";
require "jobs.php";
require "request.php";

// Get the Database instance and connection
$db = Database::getInstance();
$connection = $db->getConnection();

// HTTP Request
$request = new Request('https://jenkins.qa.ubuntu.com/api/json?tree=jobs[name,lastBuild[result]]');

// get the list of jobs from jenkins API
$jobs = $request->getResults();

// insert on database
foreach ($jobs as $index => $job){
  if ( $index >50 ) break;

  $new_job = new Jobs( $connection, $job['name'], $job['lastBuild']['result'] );
  $new_job->save();
}

// get all jobs from database
$jobs = Jobs::findAll($connection);
while ($job = $jobs->fetchArray())
{
    echo $job['name']." ".$job['status']." ".$job["checked_date"] . PHP_EOL;
}
