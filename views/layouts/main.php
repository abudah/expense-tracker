<?php
use \app\core\Application;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://drive.google.com/uc?export=view&id=1C85jhiZw3TURBlsRQJtiD-nnatEZQiya" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital@1&family=Oswald&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
    <title><?php echo $this->title?></title>
</head>
<body>
<div class="side-menu-2">
    <div class="brand-name-2">
        <div class="img-case" >
            <img src="https://i.ibb.co/2FHfByD/photo-2022-06-12-20-47-10.jpg" alt="photo-2022-06-12-20-47-10" border="0" width="50%" height="50%"> <br>

        </div>


    </div>
    <div class="user-pp">
        <h3 >Yidid07</h3>
    </div>
    <ul>
        <li><i class="fa fa-dashboard" aria-hidden="true">&nbsp</i> <a href="#"> <span> Dashboard</span></a>  </li>
        <li> <i class="fa fa-calendar" aria-hidden="true">&nbsp</i> <a href=""><span>Add expense</span></a> </li>
        <li> <i class="fa fa-book" aria-hidden="true"></i></i> <a href="income"><span>Income</span></a> </li>
        <li> <i class="fa fa-money" aria-hidden="true">&nbsp</i> <a href="expense"><span>Expense</span></a> </li>
        <li> <i class="fa fa-money" aria-hidden="true">&nbsp</i> <a href="plan"><span>Plan</span></a> </li>
        <li>  <i class="fa fa-newspaper-o" aria-hidden="true">&nbsp</i> <a href=""><span>Blog</span> </a></li>
        <li> <i class="fa fa-comment" aria-hidden="true">&nbsp</i>  <a href=" "><span> Add Feedback</span> </a></li>
    </ul>
</div>

<div class="container">
    <div class="header">
        <div class="nav">

            <div class="user">
                <!-- <a href="#" class="btn-2"> <i class="fa fa-plus" aria-hidden="true">&nbsp add income</i></a> -->
                <i class="fa fa-bell" aria-hidden="true" style="color:#826F66;"></i>
                <div class="img-case">
                    <img src="https://i.ibb.co/2FHfByD/photo-2022-06-12-20-47-10.jpg" alt="photo-2022-06-12-20-47-10" border="0">

                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <?php if (Application::$app->session->getFlash('success')):?>

            <div class="alert alert-success">
                <?php echo Application::$app->session->getFlash('success')?>
            </div>
        <?php endif ?>

            {{content}}
    </div>
</div>

</body>
</html>

