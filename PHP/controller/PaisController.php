<?php
include_once'../model/PaisModel.php';
include_once'../DAO/PaisDao.php';


    if(isset($_REQUEST['inserir'])){
     
        $nome = $_POST['txtNome'];
        $sigla = $_POST['txtSigla'];
        $pais = new Pais($nome, $sigla);
     
        /*$pais = new Pais();
         $pais->setNome($nome);
         $pais->setSigla($sigla);*/

         echo $pais->getNome().' '.$pais->getSigla();

         PaisDao::inserir($pais);
         header("Location: ../view/FrmPais.php");        
    }

    if(isset($_REQUEST['editar'])){
        $pais = new Pais(); 
        $pais->setNome($_POST['txtNome']);
        $pais->setSigla($_POST['txtSigla']);
        $pais->setId($_GET['id']);
        paisDao::editar($pais);
        header("Location: ../view/FrmPais.php");
    }

    if(isset($_REQUEST['excluir'])){
        $id = $_GET['id'];
        $pais = PaisDao::buscarPorId($id);
        echo '<br><br><hr>'
            .'<h3> Confirma a Exclusão do Pais '.$pais->getNome(). '?</h3>';
        echo '<a href="?ConfirmaExcluir&id='.$id.'">'
            .'<button> Sim </button></a>';
        echo '<a href="../view/FrmPais.php"><button>Não</button></a>'
            .'<br><br><hr>';
    }

    if(isset($_REQUEST['ConfirmaExcluir'])){
        $id = $_GET['id'];
        PaisDao::excluir($id);
        header("Location: ../view/FrmPais.php");
    }

?>