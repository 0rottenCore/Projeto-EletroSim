<?php

require_once __DIR__ . '/controller/controller.php';
$acao = $_GET['acao'] ?? 'home';
$caso = $_GET['caso'] ?? '0';

switch ($acao) {
    case 'cadastrarEletronico':
        controller_cadastrarEletronico();
        break;
    case 'consultarEletronico':
        controller_consultarEletronico($caso);
        break;
    case 'consultarRegistro':
        controller_consultarRegistro();
        break;
    case 'consultarEletronicoPorId':
        controller_consultarEletronicoPorId();
        break;
    case 'cadastrarConsumo':
        controller_cadastrarConsumo();
        break;
    case 'excluirEletronico':
        controller_excluirEletronico();
        break;
    case 'excluirRegistro':
        controller_excluirRegistro();
        break;
    case 'editarEletronico':
        controller_editarEletronico();
        break;
    default:
        controller_home();
        break;
}