<?php
include_once'../model/CidadeModel.php';
include_once'../DAO/CidadeDao.php';

if(isset($_REQUEST['inserir'])){
    $nome = $_POST['txtCidade'];
    $cep = $_POST['txtCep'];
    $pais = $_POST['txtPais'];
    $estado = $_POST['txtEstado'];

    $cidade = new Cidade($nome, $cep, $pais, $estado);     
    echo $cidade->getNome().' '.$cidade->getCep().' '.$cidade->getIdPais().' '.$cidade->getIdEstado();

    CidadeDao::inserir($cidade);

    header("Location: ../view/FrmCidade.php");
    
}

if(isset($_REQUEST['editar'])){
    $cidade = new Cidade(); 
    $cidade->setNome($_POST['txtCidade']);
    $cidade->setCep($_POST['txtCep']);
    $cidade->setIdPais($_POST['txtPais']);
    $cidade->setIdEstado($_POST['txtEstado']);
    $cidade->setId($_GET['id']);
    CidadeDao::editar($cidade);
    header("Location: ../view/FrmCidade.php");
}

if(isset($_REQUEST['excluir'])){
    $id = $_GET['id'];
    $cidade = CidadeDao::buscarPorId($id);
    echo '<br><br><hr>'
        .'<h3> Confirma a Exclusão da cidade '.$cidade->getNome(). '?</h3>';
    echo '<a href="?ConfirmaExcluir&id='.$id.'">'
        .'<button> Sim </button></a>';
    echo '<a href="../view/FrmCidade.php"><button>Não</button></a>'
        .'<br><br><hr>';
}

if(isset($_REQUEST['ConfirmaExcluir'])){
    $id = $_GET['id'];
    CidadeDao::excluir($id);
    header("Location: ../view/FrmCidade.php");
}

?>