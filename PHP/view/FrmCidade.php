<?php
    include_once '../DAO/PaisDao.php';
    include_once '../DAO/EstadoDao.php';
    include_once '../DAO/CidadeDao.php';


    $action = "inserir";
    
    $nome = "";
    $cep ="";
    $pais ="";
    $estado="";

    if(isset($_REQUEST['editar'])){
        $cidade = CidadeDao::buscarPorId($_GET['id']);
        $nome = $cidade->getNome();
        $cep = $cidade->getCep();
        $pais = $cidade->getIdPais();
        $estado = $cidade->getIdEstado();
        $action = "editar&id=".$cidade->getId();
    }

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, inital-scale = 1.0, user-scalable = no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" > 
    <title>Cadastro Cidade</title>
</head>


<body>
    <div class="container">
        <form action="../controller/CidadeController.php?<?php echo $action?>"
        method="POST" 
        class="form-control">
        
            <label for="txtCidade" class="form-label">Cadastre uma Cidade: </label>
            <input type="text"  value="<?php echo $nome?>" class="form-control" id="txtCidade" name="txtCidade" placeholder="Cidade" required>

            <br>
            <label for="txtEstado" class="form-label">Selecione um estado: </label>
            <select class="form-select" id="txtEstado" name="txtEstado">
                <option selected>Selecione um Estado</option>
                    <?php
                        $lista = EstadoDao::buscar();
                         //var_dump($lista);
                         foreach($lista as $estado){
                        
                            $selecionar = "";
                            if($idEstado == $estado->getId()){
                            $selecionar = "selected";
                        }
                        echo '<option '.$selecionar.' value="'.$estado->getId().'">'. 
                        $estado->getNome().'</option>';
                         }

                    ?>
            </select>

            <br>
            <label for="txtPais" class="form-label">Selecione um País: </label>
            <select class="form-select" id="txtPais" name="txtPais">
                <option selected>Selecione um País</option>
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
            <label for="txtCep" class="form-label">Digite o CEP: </label>
            <input type="text"  value="<?php echo $cep?>" class="form-control" id="txtCep" name="txtCep" placeholder="CEP">

            <br>
            <input class="btn btn-secondary" type="reset" name="b1" value="Limpar">
            <input class="btn btn-secondary" type="submit" id="bt1" value="Cadastrar">
            <a href="FrmClientes.php"><input class="btn btn-secondary" type="button" name="bpet" value="Cadastrar Cliente"></a>

        
        </form>
    </div>


    <div class="container">
        <table class="table table-striped table-hover" >
            <thead>
                <tr>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>País</th>
                    <th>CEP</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $lista = CidadeDao::buscar();
                   foreach($lista as $cidade){
                       echo '<tr>';
                       echo '<td>'.$cidade->getNome().'</td>';
                       echo '<td>'.$cidade->getIdEstado().'</td>';
                       echo '<td>'.$cidade->getIdPais().'</td>';
                       echo '<td>'.$cidade->getCep().'</td>';
                       echo '<td><a href="FrmCidade.php?editar&id='.$cidade->getId().'">
                       <button>Editar</button> </a> </td>';
                       echo '<td><a href="../controller/CidadeController.php?excluir&id='.$cidade->getId().'">
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