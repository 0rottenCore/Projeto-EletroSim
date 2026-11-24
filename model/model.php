<?php
require_once __DIR__ .'/../config/init.php';

#funções do eletronico >

function inserir_eletronico($nome, $potencia){
    global $pdo;
    $sql = $pdo->prepare("INSERT INTO eletronicos (nome, potencia) VALUES (:nome, :potencia)");
    $sql->bindValue('nome', $nome);
    $sql->bindValue('potencia',$potencia);
    $sql->execute();
}

function consultar_eletronico(){
    global $pdo;
    $lista = [];
    $sql = $pdo->query("SELECT * FROM eletronicos");
    if ($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    return $lista;
}

function consultar_eletronicoPorId($id){
    global $pdo;
    $eletronico = null;
    $sql = $pdo->prepare("SELECT * FROM eletronicos WHERE id = :id");
    $sql->bindValue(':id',$id);
    $sql->execute();
    if ($sql->rowCount() > 0) {
        $eletronico = $sql->fetch(PDO::FETCH_ASSOC);
    }
    return $eletronico;
}

function excluir_eletronico($id){
    global $pdo;
    $sql = $pdo->prepare("DELETE FROM eletronicos WHERE id = :id");
    $sql->bindValue('id', $id);
    $sql->execute();
}

function editar_eletronico($id, $nome, $potencia){
    global $pdo;
    $sql = $pdo->prepare("UPDATE eletronicos SET nome = :nome, potencia = :potencia WHERE id = :id");
    $sql->bindValue('id', $id);
    $sql->bindValue('nome', $nome);
    $sql->bindValue('potencia',$potencia);
    $sql->execute();
}

#< funções do consumo >

function inserir_consumo($eletronico, $id_conta, $horas, $dias, $dataConta, $potencia_atual){
    global $pdo;
    $sql = $pdo->prepare("INSERT INTO consumos ( eletronico, id_conta, horas, dias, dataConta, potencia_atual) VALUES ( :eletronico, :id_conta, :horas, :dias, :dataConta, :potencia_atual)");
    $sql->bindValue('eletronico', $eletronico);
    $sql->bindValue('id_conta', $id_conta);
    $sql->bindValue('horas',$horas);
    $sql->bindValue('dias',$dias);
    $sql->bindValue('dataConta',$dataConta);
    $sql->bindValue('potencia_atual',$potencia_atual);
    $sql->execute();
    
}

#< funções do registro >

function last_id($dataConta){
    global $pdo;
    $sql = $pdo->prepare("INSERT INTO contas (dataConta) VALUES (:dataConta)");
    $sql->bindValue('dataConta',$dataConta);
    $sql->execute();
    return $pdo->lastInsertId();
}

function consultar_registro(){
    global $pdo;
    $lista = [];
    $sql = $pdo->query("SELECT * FROM contas");
    if ($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    return $lista;
}

function consultar_registroPorId($id){
    global $pdo;
    $registro = null;
    $sql = $pdo->prepare("SELECT * FROM contas WHERE id = :id");
    $sql->bindValue(':id',$id);
    $sql->execute();
    if ($sql->rowCount() > 0) {
        $registro = $sql->fetch(PDO::FETCH_ASSOC);
    }
    return $registro;
}

function excluir_registro($id){
    global $pdo;
    $sql = $pdo->prepare("DELETE FROM contas WHERE id = :id");
    $sql->bindValue('id', $id);
    $sql->execute();
}

?>