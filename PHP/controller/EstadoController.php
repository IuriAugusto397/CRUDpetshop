<?php
include_once'../model/EstadoModel.php';
include_once'../DAO/EstadoDao.php';


    if(isset($_REQUEST['inserir'])){
        $nome = $_POST['txtEst'];
        $uf = $_POST['txtUF'];
        $pais = $_POST['txtPais'];

        $estado = new Estado($nome, $uf, $pais);     
        echo $estado->getNome().' '.$estado->getUf().' '.$estado->getPais();

        EstadoDao::inserir($estado);

        header("Location: ../view/FrmEstado.php");
        
    }

    if(isset($_REQUEST['editar'])){
        $estado = new Estado(); 
        $estado->setNome($_POST['txtEst']);
        $estado->setUf($_POST['txtUF']);
        $estado->setPais($_POST['txtPais']);
        $estado->setId($_GET['id']);
        EstadoDao::editar($estado);
        header("Location: ../view/FrmEstado.php");
    }

    if(isset($_REQUEST['excluir'])){
        $id = $_GET['id'];
        $estado = EstadoDao::buscarPorId($id);
        echo '<br><br><hr>'
            .'<h3> Confirma a Exclusão do Estado '.$estado->getNome(). '?</h3>';
        echo '<a href="?ConfirmaExcluir&id='.$id.'">'
            .'<button> Sim </button></a>';
        echo '<a href="../view/FrmEstado.php"><button>Não</button></a>'
            .'<br><br><hr>';
    }

    if(isset($_REQUEST['ConfirmaExcluir'])){
        $id = $_GET['id'];
        EstadoDao::excluir($id);
        header("Location: ../view/FrmEstado.php");
    }
?>