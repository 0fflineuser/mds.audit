<?php $title = 'LogIn'; ?>
<?php ob_start(); ?>
<!-- <img src="image/image500.jpg" alt="image 500kb"> -->
<img src="image/hacker.webp" alt="Un hacker dans un fond noir avec des ecritures binaires."  width="100%" />
<h1>Login Form</h1>
<form class="g-3" id="formulaire" action="index.php?action=login" method="post">
    <div class="mb-3">
        <label class="form-label" for="email"><strong>Email</b></label>
        <input class="form-control" type="text" placeholder="Enter email" name="email" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="password"><strong>Password</b></label>
        <input class="form-control" type="password" id="password" placeholder="Enter Password" name="password" required>
    </div>
    <div>
        <button class="btn btn-primary" type="submit" name="submit">Login</button>
    </div>
</form>

<script src="js/crypto-js.min.js"></script>
<script type="text/javascript">
const formulaire = document.getElementById('formulaire');
const password = document.getElementById('password');
formulaire.addEventListener('submit', (e) => {
    console.log(password.value);
    password.value = CryptoJS.SHA256(password.value);
    console.log(password.value);
});
</script>

<a class="btn btn-secondary" href='index.php?action=register'>register</a>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
