<?php
    $action = "inserir";
    include_once '../DAO/PaisDao.php';
    include_once '../DAO/EstadoDao.php';

    $nome = "";
    $uf = "";
    $pais = "";

    if(isset($_REQUEST['editar'])){
        $estado = EstadoDao::buscarPorId($_GET['id']);
        $nome = $estado->getNome();
        $uf = $estado->getUf();
        $idPais = $estado->getPais();
        $action = "editar&id=".$estado->getId();
    }



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Cadastro Estado</title>
</head>
<body>
    <div class="container">
        <form action="../controller/EstadoController.php?<?php echo $action?>"
        method="POST" 
        class="form-control">

            <label for="txtEst" class="form-label">Digite o nome do estado: </label>
            <input type="text" value="<?php echo $nome?>" name="txtEst"  id="txtEst" class="form-control" placeholder="Estado">

            <label for="txtUF" class="form-label">Selecione a  Unidade Federativa</label>
            <input type="text"value="<?php echo $uf?>"  name="txtUF"  id="txtUF" class="form-control" placeholder="UF">

            <label for="txtPais" class="form-label">Selecione o país</label>
            <select class="form-select" name="txtPais" id="txtPais">
                <option>Selecione o País</option>
               <?php
                    $lista = PaisDao::buscar();
                    //var_dump($lista);
                    foreach($lista as $pais){
                        
                        $selecionar = "";
                        if($idPais == $pais->getId()){
                            $selecionar = "selected";
                        }
                        echo '<option '.$selecionar.' value="'.$pais->getId().'">'. 
                        $pais->getNome().'</option>';
                   }

               ?>


            </select>

            <br>
            <input class="btn btn-secondary" type="reset" name="b1" value="Limpar">
            <input class="btn btn-secondary" type="submit" id="bt1" value="Cadastrar">
            <a href="FrmCidade.php"><input class="btn btn-secondary" type="button" name="bpet" value="Cadastrar Cidade"></a>

        </form>
    </div>

    <?php
        $lista = EstadoDao::buscar();
    ?>

    <div class="container">

        <table class="table" >
            <thead>
                <tr>
                    <th>ESTADO</th>
                    <th>UF</th>
                    <th>PAÍS</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                   foreach($lista as $estado){
                       echo '<tr>';
                       echo '<td>'.$estado->getNome().'</td>';
                       echo '<td>'.$estado->getUf().'</td>';
                       echo '<td>'.$estado->getPais()->getNome().'</td>';
                       echo '<td><a href="FrmEstado.php?editar&id='.$estado->getId().'">
                       <button>Editar</button> </a> </td>';
                       echo '<td><a href="../controller/EstadoController.php?excluir&id='.$estado->getId().'">
                       <button>Excluir</button> </a> </td>';
                       echo '</tr>';
                   }
                   ?>
            </tbody>

        </table>
    </div>

</body>
</html>