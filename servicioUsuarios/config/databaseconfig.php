<?php
const BASE='spacemanager';
const HOST='localhost:3307';
const USUARIO ='root';
const PASS='';
const OPCIONES = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET
NAMES utf8", PDO::ATTR_ERRMODE =>
PDO::ERRMODE_EXCEPTION,PDO::ATTR_PERSISTENT =>true);