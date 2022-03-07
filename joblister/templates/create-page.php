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

<form action="" method="get" class="form-control">
    <h3 class="page-header p-3">
        <?php echo $title;?>
    </h3>
    <div class="container">

        <form action="create.php" method="post">
            
            <div class="form-group pt-2">
                <label class="pb-1">Company: </label>
                <input type="text" class="form-control" name="company">
            </div>
            
            <div class="form-group pt-2">
                <label class="pb-1">Category: </label>
                <select class="form-select" name="category">
                    <option value="0">Choose Category</option>
                    <?php foreach ($category_id as $category):?>
                        <option value="<?php echo $category->id;?>">
                            <?php echo $category->name;?>
                        </option>
                    <?php endforeach?>
                </select>
            </div>
            
            <div class="form-group pt-2">
                <label class="pb-1">Job Title: </label>
                <input type="text" class="form-control" name="job_title">
            </div>
            
            <div class="form-group pt-2">
                <label class="pb-1">Description: </label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            
            <div class="form-group pt-2">
                <label class="pb-1">Salary: </label>
                <input type="text" class="form-control" name="salary">
            </div>
            
            <div class="form-group pt-2">
                <label class="pb-1">Contact User: </label>
                <input type="text" class="form-control" name="contact_user">
            </div>
            
            <div class="form-group pt-2">
                <label class="pb-1">Contact Email: </label>
                <input type="text" class="form-control" name="contact_email">
            </div>
            
            <br>
            <input type="submit" class="btn btn-secondary" value="submit" name="submit">
            <p></p>

        </form>
        
    </div>
</form>


<?php include_once 'default/footer.php';?>