<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('partials/links.php')?>
    <title>Document</title>
</head>
<body>
    <?php include('partials/header.php')?>
        <?php echo password_verify('1234', '$2y$10$1/11G1HjStR694RSXtUdBOJY/gv8sTrVusjlzFQh/wbIuCWAVOPES'); ?>
    <?php include('partials/footer.php')?>
</body>
</html>