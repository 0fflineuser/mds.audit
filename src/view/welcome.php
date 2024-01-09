<?php $title = 'Welcome' ?>
<?php ob_start() ?>

<img src="image/image4mb.jpg" alt="image 4 mb" style="width: 1080px">
<img src="image/rose.jpg" alt="image 4 mb" style="width: 100px">
<div class="jumbotron jumbotron-fluid text-center">
    <h2 class="display-4">Welcome <?= $_SESSION['username'] ?></h2>
    <p class="lead">
        <a class="btn btn-primary" href='index.php?action=logout'>Logout</a>
    </p>
</div>
<?php $content = ob_get_clean() ?>
<?php require('template.php') ?>
