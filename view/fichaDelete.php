<?php
require_once __DIR__ .'/../model/model.php';
$id = $_GET['id'];
$registro = consultar_registroPorId($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

</head>
<body>

<div style="grid-template-columns: 250px 1fr;" class="d-grid">

<div class="d-flex flex-column flex-shrink-0 p-3 vh-100 text-bg-dark " style="width: 250px;" bis_skin_checked="1">
<a href="../index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"><i class="bi bi-sunrise-fill ms-3 me-3"></i><span class="fs-4"> EletroSim</span> </a> 
<hr> <ul class="nav nav-pills flex-column mb-auto"> <li class="nav-item"> <a href="../index.php" class="nav-link text-white" aria-current="page">
<i class="bi bi-house"></i>  Home
</a> </li> <li> <a href="../index.php?acao=consultarEletronico&caso=1" class="nav-link text-white"> <i class="bi bi-pencil-square"></i>
Cadastrar eletronicos
</a> </li> <li> <a href="../index.php?acao=consultarEletronico&caso=2" class="nav-link text-white"> <i class="bi bi-file-earmark-plus"></i>
Criar registro
</a> </li> <li> <a href="../index.php?acao=consultarRegistro" class="nav-link text-white"> <i class="bi bi-layout-split"></i> 
 Comparar registros
</a> </li> <li> <a href="#" class="nav-link text-white"><i class="bi bi-card-checklist"></i> 
Definidor de metas
</a> </li> </ul> <hr> <div class="dropdown" bis_skin_checked="1"> <a class="d-flex align-items-center text-white text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">  </a> <ul class="dropdown-menu shadow" data-bs-theme="dark"> <li><a class="dropdown-item" href="#">New project...</a></li> <li></li> <li><a class="dropdown-item" href="#">Profile</a></li> <li><hr class="dropdown-divider"></li> <li><a class="dropdown-item" href="#">Sign out</a></li> </ul> </div>
</div>

<div class="p-5 bg-dark-subtle text-dark-emphasis">

<h2>Excluir registro</h2>
<h4>Tem certeza que deseja excluir o seguinte registro?:</h4>
<h5 class="mb-4">Aviso: Essa ação não pode ser desfeita!</h5>

    
<form action="../index.php?acao=excluirRegistro" method="POST">
    <input type="hidden" name="id" value=<?=$registro['id'];?>>
    <div class="border rounded-3 overflow-auto mb-3" style="width: 450px;">
    <table class="table table-dark table-striped mb-0 p-0">
        <thead>
            <tr>
                <th>Data: </th>
                <th>ID: </th>
            </tr>   
        </thead>
        <tbody>
            <tr>
                <td><?=$registro['dataConta'];?></td>
                <td><?=$registro['id'];?></td>
            </tr>
        </tbody>
    </table>
</div>    
<button class="btn btn-danger" type="submit">Excluir</button>
<a class="btn btn-warning" href="../index.php?acao=home">Cancelar</a>
</form>
</div> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>