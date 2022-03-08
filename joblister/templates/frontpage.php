
<?php include_once 'default/nav.php';?>

<header class="p-3">
    <div class="container bg-gray rounded-3 text-center p-5">
        <h1 class="display-1">Find a Job</h1>
        <form method="GET" action="index.php">
            <select name="category" class="form-select mt-5">
                <option value="0">Choose Categories</option>
                <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->id;?>">
                    <?php echo $category->name;?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <input type="submit" class="btn btn-lg btn-success" value="FIND">
        </form>
    </div>
</header>

<!-- SECTION EXAMPLE-->
<div class="container">
    <br>
    <h3><?php echo $title;?></h3>
    <br>
    <?php foreach($jobs as $job): ?>
    <div class="d-flex border-bottom">
        <section class="container p-3 lead flex-4">
            <h4 class="p-2">
            <?php echo $job->job_title; ?>
            </h4>
            <p>
            <?php echo $job->description;?>
            </p>
        </section>
        <div class="d-flex col-md-10 flex-1 justify-content-center align-items-center">
            <a href="job.php?id=<?php echo $job->id;?>" class="btn btn-secondary ps-4 pe-4 pt-3 pb-3">View</a>
        </div>
    </div>
    <?php endforeach ?>

</div>


<?php include_once 'default/footer.php';    ?>