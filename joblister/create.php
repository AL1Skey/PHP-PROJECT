<?php include_once 'config/init.php';?>

<?php
//THIS CODE SAME AS INIT BUT WITH DIFFERENT FRONTPAGE
$template = new Template("templates/create-page.php");
$job = new Job;

/*
POST AND GET ARE DIFFERENT
POST ARE HIDDEN
GET ARE NOT HIDDEN IN URL
EX:
GET:HTTPS://.../ID=X
POST:HTTPS://.../
*/

//IF POST HAS SUBMIT VALUE
if(isset($_POST['submit'])){
    //Create Data Array
    $data = array();

    foreach($_POST as $post){
        if($post == 0 || $post == null){
            redirect('','Please fill in the blank','error');
        }
    }
    
    $data['job_title'] = $_POST['job_title'];
    $data['company'] = $_POST['company'];
    $data['category_id'] = $_POST['category'];
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];

    if($job->createJob($data)){
        redirect('index.php','Your job has been listed','success');
    }else{
        redirect('index.php','Something went Wrong','error');
    }
}
// else{
//     echo "something wrong";
// }

$template->title = "Create Job";
$template->category_id = $job->getCategories();
//$template->create = $job->createJob();
// $job_id = isset($_GET['id'])? $_GET['id'] : null;

// $template->job = $job->getJob($job_id); 
// $template->title = $job->getByCategory($job_id);

//PRINT JOB-SINGLE.PHP
echo $template;
?>
