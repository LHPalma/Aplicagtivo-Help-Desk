<?php
define('SEPARADOR', " | ");
define('SEP_ALTERNATIVO', " - ");
function removeSeparador($str, $separador = SEPARADOR, $sep_alternativo = SEP_ALTERNATIVO)
{
    return str_replace(SEPARADOR, SEP_ALTERNATIVO, $str);
}

$titulo = removeSeparador($_POST['titulo']);
$categoria = removeSeparador($_POST['categoria']);
$descricao = removeSeparador($_POST['descricao']);
$texto = $titulo . SEPARADOR . $categoria .  SEPARADOR . $descricao . PHP_EOL;

$arquivo = fopen('arquivo.hd', 'a');
fwrite($arquivo, $texto);
fclose($arquivo);

header('Location: abrir_chamado.php');