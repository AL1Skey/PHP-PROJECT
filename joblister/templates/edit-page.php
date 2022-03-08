
<?php include_once 'default/nav.php';?>

<form action="" method="post" class="form-control">

    <button type="submit" disabled style="display: none" aria-hidden="true"></button>
    
    <h3 class="page-header p-3">
        <?php echo $title;?>
    </h3>
    <div class="container">
        <!--COMPANY-->
        <div class="form-group pt-2">
            <label class="pb-1">Company: </label>
            <input type="text" class="form-control" name="company" value="<?php echo $jobData->company;?>">
        </div>
        <!-- CATEGORY -->
        <div class="form-group pt-2">
            <label class="pb-1">Category: </label>
            <select class="form-select" name="category">
                <option value="0">Choose Category</option>

                <?php foreach ($category_id as $category):?>
                    <?php if ($category->id == $jobData->category_id):?>
                        <option value="<?php echo $category->id;?>" selected>
                            <?php echo $category->name;?>
                        </option>
                    <?php else:?>
                        <option value="<?php echo $category->id;?>">
                            <?php echo $category->name;?>
                        </option>
                    <?php endif?>
                <?php endforeach?>

            </select>
        </div>
        <!--JOB TITLE -->
        <div class="form-group pt-2">
            <label class="pb-1">Job Title: </label>
            <input type="text" class="form-control" name="job_title" value="<?php echo $jobData->job_title;?>">
        </div>
        <!-- DESCRIPTION -->
        <div class="form-group pt-2">
            <label class="pb-1">Description: </label>
            <textarea class="form-control" name="description"><?php echo $jobData->description;?>
            </textarea>
        </div>
        <!-- LOCATION -->
        <div class="form-group pt-2">
            <label class="pb-1">Location: </label>
            <input type="text" class="form-control" name="location" value="<?php echo $jobData->location;?>">
        </div>
        <!-- SALARY -->
        <div class="form-group pt-2">
            <label class="pb-1">Salary: </label>
            <input type="text" class="form-control" name="salary" value="<?php echo $jobData->salary;?>">
        </div>
        <!-- CONTACT USER -->
        <div class="form-group pt-2">
            <label class="pb-1">Contact User: </label>
            <input type="text" class="form-control" name="contact_user" value="<?php echo $jobData->contact_user;?>">
        </div>
        <!-- CONTACT EMAIL -->
        <div class="form-group pt-2">
            <label class="pb-1">Contact Email: </label>
            <input type="text" class="form-control" name="contact_email" value="<?php echo $jobData->contact_email;?>">
        </div>
        
        <br>
        <input type="submit" class="btn btn-secondary" value="Submit" name="submit">
        <p></p>
        
    </div>
</form>


<?php include_once 'default/footer.php';?>

