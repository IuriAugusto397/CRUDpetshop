<?php
include_once'../model/PetsModel.php';
include_once'../DAO/PetsDao.php';

if(isset($_REQUEST['inserir'])){
     
    $nome = $_POST['txtPet'];
    $tutor = $_POST['tutorPet'];
    $raca = $_POST['racaPet'];
    $idade = $_POST['idadePet'];
    $info = $_POST['infoAdc'];
    $pets = new Pets($nome, $tutor, $raca, $idade, $info);

     echo $pets->getNome().' '.$pets->getTutor().' '.$pets->getRaca().' '.$pets->getIdade().' '.$pets->getInfo();

     PetsDao::inserir($pets);
     header("Location: ../view/FrmPets.php");        
}

if(isset($_REQUEST['editar'])){
    $pets = new Pets(); 
    $pets->setNome($_POST['txtPet']);
    $pets->setTutor($_POST['tutorPet']);
    $pets->setRaca($_POST['racaPet']);
    $pets->setIdade($_POST['idadePet']);
    $pets->setInfo($_POST['infoAdc']);
    $pets->setId($_GET['id']);
    PetsDao::editar($pets);
    header("Location: ../view/FrmPets.php");
}

if(isset($_REQUEST['excluir'])){
    $id = $_GET['id'];
    $pets = PetsDao::buscarPorId($id);
    echo '<br><br><hr>'
        .'<h3> Confirma a Exclusão do pet '.$pets->getNome(). '?</h3>';
    echo '<a href="?ConfirmaExcluir&id='.$id.'">'
        .'<button> Sim </button></a>';
    echo '<a href="../view/FrmPets.php"><button>Não</button></a>'
        .'<br><br><hr>';
}

if(isset($_REQUEST['ConfirmaExcluir'])){
    $id = $_GET['id'];
    PetsDao::excluir($id);
    header("Location: ../view/FrmPets.php");
}

?>