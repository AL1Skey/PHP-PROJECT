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
<body>
    <nav>
        <div class="container">
            <div class="navbar navbar-expand-lg p-3 pb-1 border-bottom">
                <!--BRAND-->
                <div class="navbar-brand text-brand">
                    <h3 class="brand"><?php echo SITE_TITLE;?></h3>
                </div>
                <!-- Nav Bar Collapse-->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmain">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Nav Bar -->
                <div class="collapse navbar-collapse text-secondary" id="navmain">
                    <ul class="navbar-nav ms-auto navbarmain">
                        <li class="nav-item border-radius">
                            <a href="index.php" class="nav-link text-gray ">Home</a>
                        </li>
                        <li class="nav-item border-radius">
                            <a href="create.php" class="nav-link text-gray">Create Listing</a>
                        </li>
                </div>
            </div>
        </div>
    </nav>

    <!-- DISPLAY MESSAGE -->
    <br>
    <?php displayMessage();?>
    