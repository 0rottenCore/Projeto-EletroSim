<?php
require_once __DIR__ .'/../model/model.php';

function controller_home() {
    $lista = consultar_registro();
    require_once __DIR__ . '/../view/home.php';
}

#controll do eletronico >

function controller_cadastrarEletronico(){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['nome'] ?? '';
        $potencia = $_POST['potencia'] ?? '';
        if (inserir_eletronico($nome, $potencia)) {
            echo 'cadastrado com sucesso!';
            exit;
        }
    }
    header("Location: index.php?acao=consultarEletronico&caso=1");
}

function controller_consultarEletronico($caso){
        $caso = $_GET['caso'] ?? 0;
        $lista = consultar_eletronico();
        if ($caso == 1) {
            require_once __DIR__ . '/../view/formCadastrarE.php';
        }elseif ($caso == 2) {
            require_once __DIR__ . '/../view/formConta.php';
        }else{
            echo 'outro caso';
        }
        
}

function controller_consultarEletronicoPorId(){
    $id = $_GET['id'] ?? 0;
    $lista = consultar_eletronicoPorId($id);
}

function controller_excluirEletronico(){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'] ?? 0;
        if(excluir_eletronico($id)){
        echo "foi n sei oq";
        exit;
        }
    }
    header("Location: index.php?acao=consultarEletronico&caso=1");
}

function controller_editarEletronico(){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'] ?? 0;
        $nome = $_POST['nome'] ?? '';
        $potencia = $_POST['potencia'] ?? '';
        if(editar_eletronico($id, $nome, $potencia)){
        echo "foi n sei oq";
        exit;
        }
    }
    header("Location: index.php?acao=consultarEletronico&caso=1");
}

#controll do consumo >

function controller_cadastrarConsumo(){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $dados = $_POST['dados'] ?? '';
        $dataConta = $_POST['dataConta'] ?? 0;
        $id_conta = last_id($dataConta);

        foreach ($dados as $id => $dado) {
            $dataConta;
            $id_conta;
            $horas = $dado['horas'] ?? 0;
            $dias = $dado['dias'] ?? 0;
            $potencia_atual = $dado['potencia_atual'] ?? 0;
            $eletronico = $dado['eletronico'] ?? '';
            
            inserir_consumo( $eletronico, $id_conta, $horas, $dias, $dataConta, $potencia_atual);
        }

    }
    header("Location: index.php");
}

#controll do registro >

function controller_excluirRegistro(){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'] ?? 0;
        if(excluir_registro($id)){
        echo "foi n sei oq";
        exit;
        }
    }
    header("Location: index.php");
}

function controller_consultarRegistro(){
    $lista = consultar_registro();
    require_once __DIR__ . '/../view/compararRegistros.php';
}

?>