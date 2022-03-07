<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.min.css">


    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Joblister</title>

</head>

<?php include_once 'default/nav.php';?>
<div class="container mt-2 p-2">
    <h3 class="page-header">
        <?php echo $job->job_title; ?> (<?php echo $job->location; ?>)
    </h3>
    <small>
        Posted By <?php echo $job->contact_user; ?> on <?php echo $job->post_date; ?>
    </small>

    <hr>
    <p class="lead"><?php $job->description;?></p>
    <ul class="list-group">
        <li class="list-group-item">
            <strong>Company: </strong> <?php echo $job->company;?>
        </li>
        <li class="list-group-item">
            <strong>Salary: </strong> <?php echo $job->salary;?>
        </li>
        <li class="list-group-item">
            <strong>Contact Mail: </strong> <?php echo $job->contact_email;?>
        </li>
    </ul> 

</div>


<?php include_once 'default/footer.php';?>