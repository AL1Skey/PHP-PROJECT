
<?php include_once 'config/init.php';?>

<?php
//THIS CODE SAME AS INIT BUT WITH DIFFERENT FRONTPAGE
$template = new Template("templates/job-single.php");
$job = new Job;

$job_id = isset($_GET['id'])? $_GET['id'] : null;

$template->job = $job->getJob($job_id); 
$template->title = $job->getByCategory($job_id);

//PRINT JOB-SINGLE.PHP
echo $template;