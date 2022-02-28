<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;

$template = new Template('templates/frontpage.php');


//CREATE TITLE VARIABLE AND ADDING TITLE TO FRONTPAGE
$template->title = 'Latest Job';
//GET JOBS FROM SQL QUERY AND LIST ALL JOB AND ADD TO jobs VARIABLE AS ARRAY
$template->jobs = $job->getAllJobs();

echo $template;