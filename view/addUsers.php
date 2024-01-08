<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('partials/links.php') ?>
    <link rel="stylesheet" href="css/addUser.css">
    <title>Create Users</title>
</head>

<body>
    <?php include('partials/header.php') ?>
    <main class="d-flex align-items-center justify-content-center ">
        <div class='col-7 rounded pb-3'>
            <h2 class='ms-3 align-items-center mt-3'><i class="bi bi-chevron-left me-3" id='go-back'></i> Create user</h2>
            <div class='col-12 d-flex flex-column align-items-center mt-3'>
                <input type="text" placeholder="User name*" class='rounded col-8' id='input-user-name'>
                <div class='col-12 d-flex justify-content-center mt-2'>
                    <input type="text" placeholder='Name*' class='rounded col-3' id='input-name'>
                    <div class="col-1"></div>
                    <input type="text" placeholder='Last name*' class='rounded col-4' id='input-last-name'>
                </div>
                <div class='col-12 d-flex justify-content-center mt-2'>
                    <input type="password" placeholder='Password*' class='rounded-left col-5' id='input-password'>
                    <button class='col-3 rounded-right button-generate-random' id='generate-pwd'>Generate random</button>
                </div>
                <input type="email" placeholder='Email*' class='rounded mt-2 col-8' id='input-email'>
                <button class='col-3 mt-3 rounded button-add-user' id='addUser'>Add user</button>
                <div class='col-4 mt-3' id='container-messaje'></div>
            </div>

        </div>
    </main>
    <?php include('partials/footer.php') ?>
    <?php include('partials/bootstraoscript.php') ?>
    <script src='js/addUser.js'></script>
</body>

</html>