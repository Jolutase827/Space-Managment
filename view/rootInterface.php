<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('partials/links.php')?>
    <link rel="stylesheet" href="css/rootInterface.css">
    <title>Document</title>
</head>
<body>
    <?php include('partials/header.php')?>
        <nav class="d-flex justify-content-around align-items-center">
            <button class='active' id='button1'>Users</button>
            <button class='' id='button2'>Spaces</button>
            <button class='' id='button3'>Seasons</button>
        </nav>
        <main id='users'>
            <div class='col-12 d-flex justify-content-between'>
                <h1 class='ms-3 mt-2 title col-3'>Users</h1>
                <div class='me-3 mt-2 d-flex justify-content-between col-5'>
                    <div class='d-flex align-items-center'>
                        <input type="radio" id="radio"><label for="radio" class='ms-2 mb-1'>Select</label>
                    </div>
                    <button class='mt-2 rounded-pill boton-anyadir-users' id='addUsers'><i class="bi bi-person-plus-fill"></i> Add Users</button>
                    <div class='col-6 d-flex align-items-center position-relative ms-5'>
                        <i class="bi bi-search lupa"></i>
                        <input type="text"  id="" class="rounded-left searcher p-1 ps-4" placeholder="Search user">
                        
                        <button class="rounded-right button-searcher p-1 pe-2">Search</button>
                    </div>
                </div>
            </div>
            <div class="container-users mt-4 d-flex flex-column align-items-center" id="user-container">
            </div>
            <br>
        </main>
    <?php include('partials/footer.php')?>
    <script src='js/navChanges.js'></script>
    <script src="js/buttonActions.js"></script>
    <script src='js/selectUsers.js'></script>
    <script src='js/colocateUsers.js'></script>
</body>
</html>