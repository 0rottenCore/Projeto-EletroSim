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
<a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"><i class="bi bi-sunrise-fill ms-3 me-3"></i><span class="fs-4"> EletroSim</span> </a> 
<hr> <ul class="nav nav-pills flex-column mb-auto"> <li class="nav-item"> <a href="index.php" class="nav-link text-white" aria-current="page">
<i class="bi bi-house"></i>  Home
</a> </li> <li> <a href="index.php?acao=consultarEletronico&caso=1" class="nav-link active"> <i class="bi bi-pencil-square"></i>
Cadastrar eletronicos
</a> </li> <li> <a href="index.php?acao=consultarEletronico&caso=2" class="nav-link text-white"> <i class="bi bi-file-earmark-plus"></i>
Criar registro
</a> </li> <li> <a href="index.php?acao=consultarRegistro" class="nav-link text-white"> <i class="bi bi-layout-split"></i> 
 Comparar registros
</a> </li> <li> <a href="#" class="nav-link text-white"><i class="bi bi-card-checklist"></i> 
Definidor de metas
</a> </li> </ul> <hr> <div class="dropdown" bis_skin_checked="1"> <a class="d-flex align-items-center text-white text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">  </a> <ul class="dropdown-menu shadow" data-bs-theme="dark"> <li><a class="dropdown-item" href="#">New project...</a></li> <li></li> <li><a class="dropdown-item" href="#">Profile</a></li> <li><hr class="dropdown-divider"></li> <li><a class="dropdown-item" href="#">Sign out</a></li> </ul> </div>
</div>

<div class="p-5 bg-dark-subtle text-dark-emphasis">

<h2>Cadastrar eletrônicos</h2>
<h4>Informe os eletrônicos e suas potências:</h4>

    <div style="width: 300px;">
    <form action="index.php?acao=cadastrarEletronico" method="POST">
        <input class="form-control bg-primary-subtle border-secondary mb-2" type="text" placeholder="Nome" name="nome" id="nome" required>
        <input class="form-control bg-primary-subtle border-secondary mb-3" type="number" placeholder="Potência" name="potencia" id="potencia" required>
        <button class="btn btn-primary mb-3" type="submit">Salvar</button>
    </form>
    </div>

    <h3>Lista de eletronicos já registrados:</h3>
    <div class="border rounded-3 overflow-auto" style="width: 540px;">
    <table class="table table-dark table-striped mb-0 p-0">
        <thead>
            <tr>
                <th>Nome:</th>
                <th>Potência:</th>
                <th>Ações:</th>
            </tr>
                
        </thead>
        <tbody>
            <?php if (!empty($lista) && count($lista) > 0):?>
            <?php foreach ($lista as $eletronico):?>
            <tr>
                <td><?=$eletronico['nome'];?></td>
                <td><?=$eletronico['potencia'];?></td>
                <td>
                <a href="view/formEditar.php?id=<?=$eletronico['id'];?>" class="btn btn-warning"><i class="bi bi-pencil-square me-2"></i></a>
                <a href="view/formDelete.php?id=<?=$eletronico['id'];?>" class="btn btn-danger"><i class="bi bi-trash3 me-2"></i></a>
                </td>
            </tr>
        </tbody>
            <?php endforeach;?>
            <?php else: ?>
            <tr>
                <td>
                    Nenhum eletrônico encontrado. Tente registrar seu primeiro!
                </td>
                <td></td><td></td>
            </tr>
            <?php endif; ?>
    </table>
    </div>        
</div>    
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>