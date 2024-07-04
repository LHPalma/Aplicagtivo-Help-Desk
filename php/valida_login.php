<?php
session_start();

$usuario_autenticado = false;

$usuarios_app = array(
    array("email" => "adm@teste.com.br", "senha" => "1234"),
    array("email" => "user@teste.com.br", "senha" => "abcd"),
);

foreach ($usuarios_app as $user) {
    if ($user['email'] == $_POST['email'] and $user['senha'] == $_POST['senha']) {
        $usuario_autenticado = true;
        break;
    }
};

if ($usuario_autenticado) {
    $_SESSION['autenticado'] = true;
    header('Location: home.php');
}
else {
    $_SESSION['autenticado'] = false;
    header('Location: index.php?login=erro');
}
