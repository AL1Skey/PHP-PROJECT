<?php include_once 'config/init.php'; ?>

<?php
$job = new Job;

$template = new Template('templates/frontpage.php');

/* THIS SYNTAX ($category = isset($_GET['category']) ? $_GET['category'] : null;) WILL DO:
FIND OUT IF $_GET['category'] IS INITIALIZE OR NOT NULL, 
IF TRUE THEN INSERT VALUE OF $_GET['category'] TO CATEGORY
    $_GET['category'] WORKS LIKE THIS:
        -)INITIALIZE GET METHOD IN HTML
        -)SET THE BODY OF FORM (SELECT TAG, INPUT_NAME TAG, ETC)
        -)SET SUBMIT BUTTON
        -)WHEN SUBMITTED (FOR NOW I USE SELECT TAG) NAME IN SELECT TAG AND VALUE IN OPTION SHOWN IN URL
        -)IT SHOWN LIKE EX:(http://localhost/PHP%20PROJECT/joblister/index.php?category=2)
        -)'category=2' IS INDEX AND VALUE OF _GET[]
        -)WHEN INSERT '$_GET['category']' IT WILL RETURN '2'
IF NOT THEN CATEGORY BECOME NULL
*/ 
$category = isset($_GET['category']) ? $_GET['category'] : null;


if($category){
    //IF CATEGORY NOT NULL, GET JOBS FROM SQL QUERY ACCORDING TO CATEGORY ID
    $template->jobs = $job->getByCategory($category);
    //AND CHANGE TITLE ACCORDING TO CATEGORY NAME
    $template->title = "Jobs in ".$job->getCategory($category)->name;

}else{
    
    //CREATE TITLE VARIABLE AND ADDING TITLE TO FRONTPAGE
    
    $template->title = 'Latest Job';
    
    //GET JOBS FROM SQL QUERY AND LIST ALL JOB AND ADD TO jobs VARIABLE AS ARRAY
    
    $template->jobs = $job->getAllJobs();
}

//GET CATEGORIES FROM SQL QUERY AND ADD THEM AS ARRAYS
$template->categories = $job->getCategories();

//PRINT FRONTPAGE FILE
echo $template;