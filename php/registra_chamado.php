<?php
session_start();


function recebe_e_ProcessaDados()
{
    $titulo = removeSeparador($_POST['titulo']);
    $categoria = removeSeparador($_POST['categoria']);
    $descricao = removeSeparador($_POST['descricao']);
    $texto = $_SESSION['id'] . $_SESSION['SEPARADOR'] . $titulo . $_SESSION['SEPARADOR'] . $categoria .  $_SESSION['SEPARADOR'] . $descricao . PHP_EOL;
    return $texto;
}

function removeSeparador($str, $separador = null, $sep_alternativo = null)
{
    if ($separador === null) {
        $separador = $_SESSION['SEPARADOR'];
    }
    if ($sep_alternativo === null) {
        $sep_alternativo = $_SESSION['SEP_ALTERNATIVO'];
    }
    return str_replace($separador, $sep_alternativo, $str);
}

function gravaDados($nome_arquivo, $texto)
{
    $arquivo = fopen($nome_arquivo, 'a');
    fwrite($arquivo, $texto);
    fclose($arquivo);
}
/*
    Configurações para segurança do back-end
    gravaDados('../../app_help_desk_privado/arquivo.hd', recebe_e_ProcessaDados());
*/
gravaDados('arquivo.hd', recebe_e_ProcessaDados());
header('Location: abrir_chamado.php');
