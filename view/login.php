<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('partials/links.php') ?>
    <link rel="stylesheet" href="css/login.css">
    <title>Log in</title>
</head>
<body>
<?php include('partials/header.php') ?>
    <main>
        <div class="col-12 col-md-8 col-lg-5 rounded pt-3 d-flex flex-column">
            <h1 class="mb-4 ms-4">Log in</h1>
            <div class="d-flex flex-column align-items-center">
                <input type="text" placeholder="User name" class="col-8 mb-4 rounded">
                <input type="password" placeholder="Password"  class="col-8 rounded">
                <button class="button-enter mt-3 rounded">Enter</button>
            </div>
            <p class="col-8 ms-4 mt-4 mb-5">If you don't have account or forget your <strong>password</strong> please contact with the <a href="">adminstrator</a></p>
        </div>
    </main>
    <?php include('partials/footer.php') ?>
    <?php include('partials/bootstraoscript.php') ?>
</body>
</html>