<?php
spl_autoload_register(function ($clase) {
    include "class/$clase.php";
    });