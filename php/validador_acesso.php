<?php
session_start();

if (!isset($_SESSION['autenticado']) ||  $_SESSION != true) {
    header('Location: index.php?login=erro2');
}
