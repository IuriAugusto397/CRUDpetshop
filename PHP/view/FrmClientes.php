<?php
    //include_once '../DAO/PaisDao.php';
    //include_once '../DAO/EstadoDao.php';
    include_once '../DAO/CidadeDao.php';
    include_once '../DAO/ClientesDao.php';

    $action = "inserir";
    
    $nome = "";
    $nacionalidade ="";
    $cpf ="";
    $email="";
    $telefone="";
    $endereco="";
    $numero="";
    $cidade="";
    $complemento="";

    if(isset($_REQUEST['editar'])){
        $clientes = ClientesDao::buscarPorId($_GET['id']);
        $nome = $clientes->getNome();
        $nacionalidade = $clientes->getNacionalidade();
        $cpf = $clientes->getCpf();
        $email = $clientes->getEmail();
        $telefone = $clientes->getTelefone();
        $endereco = $clientes->getEndereco();
        $numero = $clientes->getNumero();
        $cidade = $clientes->getCidade();
        $complemento = $clientes->getComplemento();

        $action = "editar&id=".$clientes->getId();
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Cadastro Clientes</title>
</head>
<body>
    <div class="container">
        <form action="../controller/ClientesController.php?<?php echo $action?>"
            method="POST" 
            class="form-control">
            <label for="txtCliente" class="form-label">Digite seu nome:</label>
            <input type="text" value="<?php echo $nome?>" id="txtCliente" name="txtCliente" class="form-control" placeholder="nome">

            <label for="nacional" class="form-label">Digite sua Nacionalidade: </label>
            <input type="text" value="<?php echo $nacionalidade?>" id="nacional" name="nacional" class="form-control" placeholder="nacionalidade">

            <label for="cpfPa" class="form-label">Informe seu CPF ou Passaporte:</label>
            <input type="text" value="<?php echo $cpf?>" name="cpfPa" id="cpfPa" class="form-control" placeholder="CPF/Passaporte">

            <label for="txtEmail" class="form-label">Digite seu email: </label>
            <input type="email" value="<?php echo $email?>" name="txtEmail" id="txtEmail" class="form-control" placeholder="name@example.com">

            <label for="celular" class="form-label">Digite o seu telefone: </label>
            <input type="number" value="<?php echo $telefone?>" name="celular" id="celular" class="form-control" placeholder="(xx) xxxx-xxxx">

            <label for="rua" class="form-label">Digite seu endereço: </label>
            <input type="text" value="<?php echo $endereco?>" value="<?php echo $endereco?>" id="rua" name="rua" class="form-control" placeholder="rua">

            <label for="nmro" class="form-label">Número: </label>
            <input type="number" value="<?php echo $numero?>" id="nmro" name="nmro" class="form-control" placeholder="número">

            <label for="txtCidade" class="form-label">Selecione sua cidade:</label>
            <select name="txtCidade" id="txtCidade" class="form-select">
                <option selected>Selecione uma opção: </option>
                <?php
                    $lista = CidadeDao::buscar();
                    //var_dump($lista);
                    foreach($lista as $cidade){
                        
                        $selecionar = "";
                        if($idCidade == $cidade->getId()){
                            $selecionar = "selected";
                        }
                        echo '<option '.$selecionar.' value="'.$cidade->getId().'">'. 
                        $cidade->getNome().'</option>';
                   }

               ?>
            </select>

            <label for="complemento" class="form-label">Complemento:</label>
            <input type="text" value="<?php echo $complemento?>" id="complemento" name="complemento" class="form-control" placeholder="complemento">

            <br>
            <input class="btn btn-secondary" type="reset" name="b1" value="Limpar">
            <input class="btn btn-secondary" type="submit" id="bt1" value="Cadastrar">
            <a href="FrmPets.php"><input class="btn btn-secondary" type="button" name="bpet" value="Cadastrar Pet"></a>

        </form>
    </div>
    <div class="containar">
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Nacionalidade</th>
                    <th>CPF/Passaporte</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Número</th>
                    <th>Cidade</th>
                    <th>Complemento</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $lista = ClientesDao::buscar();
                   foreach($lista as $clientes){
                       echo '<tr>';
                       echo '<td>'.$clientes->getNome().'</td>';
                       echo '<td>'.$clientes->getNacionalidade().'</td>';
                       echo '<td>'.$clientes->getCpf().'</td>';
                       echo '<td>'.$clientes->getEmail().'</td>';
                       echo '<td>'.$clientes->getTelefone().'</td>';
                       echo '<td>'.$clientes->getEndereco().'</td>';
                       echo '<td>'.$clientes->getNumero().'</td>';
                       echo '<td>'.$clientes->getCidade().'</td>';
                       echo '<td>'.$clientes->getComplemento().'</td>';
                       echo '<td><a href="FrmClientes.php?editar&id='.$clientes->getId().'">
                       <button>Editar</button> </a> </td>';
                       echo '<td><a href="../controller/ClientesController.php?excluir&id='.$clientes->getId().'">
                       <button>Excluir</button> </a> </td>';
                       echo '</tr>';
                   }
                   ?>
               
            </tbody>
        </table>
    </div>
    
</body>
</html>
