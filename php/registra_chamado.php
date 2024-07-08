<?php
session_start();
define('SEPARADOR', " | ");
define('SEP_ALTERNATIVO', " - ");
$_SESSION['SEPARADOR'] = SEPARADOR;

function recebe_e_ProcessaDados()
{
    $titulo = removeSeparador($_POST['titulo']);
    $categoria = removeSeparador($_POST['categoria']);
    $descricao = removeSeparador($_POST['descricao']);
    $texto = $titulo . SEPARADOR . $categoria .  SEPARADOR . $descricao . PHP_EOL;
    return $texto;
}

function removeSeparador($str, $separador = SEPARADOR, $sep_alternativo = SEP_ALTERNATIVO)
{
    return str_replace(SEPARADOR, SEP_ALTERNATIVO, $str);
}

function gravaDados($nome_arquivo, $texto)
{
    $arquivo = fopen($nome_arquivo, 'a');
    fwrite($arquivo, $texto);
    fclose($arquivo);
}

gravaDados('arquivo.hd', recebe_e_ProcessaDados());
header('Location: abrir_chamado.php');