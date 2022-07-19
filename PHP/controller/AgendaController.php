<?php
include_once'../model/AgendaModel.php';
include_once'../DAO/AgendaDao.php';

if(isset($_REQUEST['inserir'])){
    $hora = $_POST['hora'];
    $data = $_POST['data'];
   
    $agenda = new Agenda($hora, $data);     
    echo $agenda->getHora().' '.$agenda->getData();

    AgendaDao::inserir($agenda);

    header("Location: ../view/FrmAgenda.php");
    
}

if(isset($_REQUEST['excluir'])){
    $id = $_GET['id'];
    $agenda = AgendaDao::buscarPorId($id);
    echo '<br><br><hr>'
        .'<h3> Quer mesmo desmarcar a agenda '.$agenda->getHora().' '.$agenda->getData(). '?</h3>';
    echo '<a href="?ConfirmaExcluir&id='.$id.'">'
        .'<button> Sim </button></a>';
    echo '<a href="../view/FrmAgenda.php"><button>Não</button></a>'
        .'<br><br><hr>';
}

if(isset($_REQUEST['ConfirmaExcluir'])){
    $id = $_GET['id'];
    AgendaDao::excluir($id);
    header("Location: ../view/FrmAgenda.php");
}

?>