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
        <div class='col-7 rounded'>
            <h2 class='ms-3 align-items-center mt-3'><i class="bi bi-chevron-left me-3"></i> Create user</h2>
            <div class='col-12 d-flex flex-column align-items-center'>
                <label>Nombre de usuario</label>
                <input type="text">
                <label>Nombre</label>
                <input type="text">
                <label>Apellido</label>
                <input type="text">
                <label>Password</label>
                <input type="text">
                <label>Email</label>
                <input type="text">
            </div>
        </div>
    </main>
    <?php include('partials/footer.php') ?>
    <?php include('partials/bootstraoscript.php') ?>   
</body>
</html>