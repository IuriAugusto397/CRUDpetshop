<?php
include_once'../DAO/PetsDao.php';
include_once'../DAO/ClientesDao.php';
$action = "inserir";

    $nome = "";
    $tutor = "";
    $raca = "";
    $idade = "";
    $info = "";

    if(isset($_REQUEST['editar'])){
        $pets = PetsDao::buscarPorId($_GET['id']);
        $nome = $pets->getNome();
        $tutor = $pets->getTutor();
        $raca = $pets->getRaca();
        $idade = $pets->getIdade();
        $info = $pets->getInfo();
        $action = "editar&id=".$pets->getId();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Cadastro de Pets</title>
</head>
<body>
    <div class="container">
        <form action="../controller/PetsController.php?<?php echo $action?>" method="POST" class="form-control">
            <label for="txtPet" class="form-label">Digite o nome do seu pet:</label>
            <input type="text"  value="<?php echo $nome?>"  id="txtPet" name="txtPet" class="form-control" placeholder="Nome do Pet">

           
            <label for="tutorPet" class="form-label">Pesquise o tutor:</label>
            <select class="form-select" name="tutorPet" id="tutorPet">
                <option>Selecione o tutor</option>
               <?php
                    $lista = ClientesDao::buscar();
                    foreach($lista as $clientes){
                        
                        $selecionar = "";
                        if($idClientes == $clientes->getId()){
                            $selecionar = "selected";
                        }
                        echo '<option '.$selecionar.' value="'.$clientes->getNome().'">'. 
                        $clientes->getNome().'</option>';
                   }

               ?>


            </select>
           


            <label for="racaPet" class="form-label">Digite a Raça do seu pet: </label>
            <input type="text" value="<?php echo $raca?>" name="racaPet" id="racaPet" class="form-control" placeholder="Raça">

            <label for="idadePet" class="form-label">Digite a idade do pet: </label>
            <input type="text" value="<?php echo $idade?>" name="idadePet" id="idadePet" class="form-control" placeholder="Exemplo: 7 meses">

            <label for="infoAdc" class="form-label">Informações Adcionais</label>
            <textarea name="infoAdc" value="<?php echo $info?>" id="infoAdc" rows="5" class="form-control" placeholder="Digite aqui"></textarea>

            <br>
            <input class="btn btn-secondary" type="reset" name="btnReset" value="Limpar">
            <input class="btn btn-secondary" type="submit" name="btnEnviar" value="Cadastrar">
            <a href="FrmAgenda.php"><input class="btn btn-secondary" type="button" name="bpet" value="Cadastrar Agenda"></a>

        </form>
    </div>
    <div class="container">
        <table class="table" >
            <thead>
                <tr>
                    <th>Nome pet</th>
                    <th>Tutor</th>
                    <th>Raça pet</th>
                    <th>Idade pet</th>
                    <th>Informações Adicionais</th>
                </tr>
            </thead>
            <tbody>
                     <?php 
                        $lista = PetsDao::buscar();
                        foreach($lista as $pets){
                            echo '<tr>';
                            echo '<td>'.$pets->getNome().'</td>';
                            echo '<td>'.$pets->getTutor().'</td>';
                            echo '<td>'.$pets->getRaca().'</td>';
                            echo '<td>'.$pets->getIdade().'</td>';
                            echo '<td>'.$pets->getInfo().'</td>';
                            echo '<td><a href="FrmPets.php?editar&id='.$pets->getId().'">
                            <button>Editar</button> </a> </td>';
                            echo '<td><a href="../controller/PetsController.php?excluir&id='.$pets->getId().'">
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