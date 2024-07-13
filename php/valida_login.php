<?php session_start();

define('SEPARADOR', " | ");
define('SEP_ALTERNATIVO', " - ");
$_SESSION['SEPARADOR'] = SEPARADOR;
$_SESSION['SEP_ALTERNATIVO'] = SEP_ALTERNATIVO;

$perfis = array(
    1 => 'Administrativo',
    2 => 'Asuário'
);

$usuario_autenticado = false;
$id_usuario = null;
$usuario_perfil_id = null;


$usuarios_app = array(
    array('id' => 1, "email" => "adm@teste.com.br", "senha" => "1234", 'perfil_id' => 1),
    array('id' => 2, "email" => "user@teste.com.br", "senha" => "abcd", 'perfil_id' => 2),
);

foreach ($usuarios_app as $user) {
    if ($user['email'] == $_POST['email'] and $user['senha'] == $_POST['senha']) {
        $usuario_autenticado = true;
        $id_usuario = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
        break;
    }
};

if ($usuario_autenticado) {
    $_SESSION['autenticado'] = true;
    $_SESSION['id'] = $id_usuario;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = false;
    header('Location: index.php?login=erro');
}
