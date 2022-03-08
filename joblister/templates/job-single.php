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
    
    <br><br>
    <a href="index.php">Go Back</a>
    <br><br>

    <div class=" bg-gray card card-body flex-row ">
        <a href="edit.php?id=<?php echo $job->id;?>" class="btn btn-secondary">Edit</a>

        <form action="job.php" method="post" style="display:inline">
            <input type="hidden" name="del_id" value="<?php echo $job->id;?>">
            <input type="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>

</div>


<?php include_once 'default/footer.php';?>