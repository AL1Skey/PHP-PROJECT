<?php include_once 'config/init.php';?>

<?php
//THIS CODE SAME AS INIT BUT WITH DIFFERENT FRONTPAGE
$template = new Template("templates/create-page.php");
$job = new Job;

$template->title = "Create Job";
$template->test = $job->getStructure();
$template->category_id = $job->getCategories();
//$template->create = $job->createJob();
// $job_id = isset($_GET['id'])? $_GET['id'] : null;

// $template->job = $job->getJob($job_id); 
// $template->title = $job->getByCategory($job_id);

//PRINT JOB-SINGLE.PHP
echo $template;