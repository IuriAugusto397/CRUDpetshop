<?php
    include_once'../DAO/PaisDao.php';
    $lista = PaisDao::buscar();
    $action = "inserir";
    
    $nome = "";
    $sigla ="";

    if(isset($_REQUEST['editar'])){
        $pais = PaisDao::buscarPorId($_GET['id']);
        $nome = $pais->getNome();
        $sigla = $pais->getSigla();
        $action = "editar&id=".$pais->getId();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Cadastro De Paises</title>
</head>
<body>
    <div class="container">
        <form action="../controller/PaisController.php?<?php echo $action?>" method="POST" class="form-control">
            <label for="txtNome" class="form-label">Cadastre um país</label>
            <input type="text" value="<?php echo $nome?>"  class="form-control" name="txtNome" id="txtNome" placeholder="País">

            <label for="txtSigla" class="form-label"></label>
            <input type="text" value="<?php echo $sigla?>" class="form-control" name="txtSigla" id="txtSigla" placeholder="Sigla">

            <br>
            <input class="btn btn-secondary" type="reset" name="btnReset" value="Limpar">
            <input class="btn btn-secondary" type="submit" name="btnEnviar" value="Cadastrar">
            <a href="FrmEstado.php"><input class="btn btn-secondary" type="button" name="bpet" value="Cadastrar Estado"></a>
        </form>

    </div>

    <div class="container">
        <table class="table" >
            <thead>
                <tr>
                    <th>País</th>
                    <th>Sigla</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                   foreach($lista as $pais){
                       echo '<tr>';
                       echo '<td>'.$pais->getNome().'</td>';
                       echo '<td>'.$pais->getSigla().'</td>';
                       echo '<td><a href="FrmPais.php?editar&id='.$pais->getId().'">
                       <button>Editar</button> </a> </td>';
                       echo '<td><a href="../controller/PaisController.php?excluir&id='.$pais->getId().'">
                       <button>Excluir</button> </a> </td>';
                       echo '</tr>';
                       echo '</tr>';
                   }
                   ?>
            </tbody>
        </table>

    
    </div>

</body>
</html>