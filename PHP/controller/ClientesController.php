<?php
include_once'../model/ClientesModel.php';
include_once'../DAO/ClientesDao.php';

if(isset($_REQUEST['inserir'])){
    $nome = $_POST['txtCliente'];
    $nacionalidade = $_POST['nacional'];
    $cpf = $_POST['cpfPa'];
    $email = $_POST['txtEmail'];
    $telefone = $_POST['celular'];
    $endereco = $_POST['rua'];
    $numero = $_POST['nmro'];
    $cidade = $_POST['txtCidade'];
    $complemento = $_POST['complemento'];

    $clientes = new Clientes($nome, $nacionalidade, $cpf, $email, $telefone, $endereco, $numero, $cidade, $complemento);     
    echo $clientes->getNome().' '.$clientes->getNacionalidade().' '.$clientes->getCpf().' '.$clientes->getEmail().' '.$clientes->getTelefone().' '.$clientes->getEndereco().' '.$clientes->getNumero().' '.$clientes->getCidade().' '.$clientes->getComplemento();

    ClientesDao::inserir($clientes);

    header("Location: ../view/FrmClientes.php");
    
}

if(isset($_REQUEST['editar'])){
    $clientes = new Clientes(); 
    $clientes->setNome($_POST['txtCliente']);
    $clientes->setNacionalidade($_POST['nacional']);
    $clientes->setCpf($_POST['cpfPa']);
    $clientes->setEmail($_POST['txtEmail']);
    $clientes->setTelefone($_POST['celular']);
    $clientes->setEndereco($_POST['rua']);
    $clientes->setNumero($_POST['nmro']);
    $clientes->setCidade($_POST['txtCidade']);
    $clientes->setComplemento($_POST['complemento']);
    $clientes->setId($_GET['id']);
    ClientesDao::editar($clientes);
    header("Location: ../view/FrmClientes.php");
}

if(isset($_REQUEST['excluir'])){
    $id = $_GET['id'];
    $clientes = ClientesDao::buscarPorId($id);
    echo '<br><br><hr>'
        .'<h3> Confirma a Exclusão do cliente '.$clientes->getNome(). '?</h3>';
    echo '<a href="?ConfirmaExcluir&id='.$id.'">'
        .'<button> Sim </button></a>';
    echo '<a href="../view/FrmClientes.php"><button>Não</button></a>'
        .'<br><br><hr>';
}

if(isset($_REQUEST['ConfirmaExcluir'])){
    $id = $_GET['id'];
    ClientesDao::excluir($id);
    header("Location: ../view/FrmClientes.php");
}

?>