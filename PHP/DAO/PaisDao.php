<?php
include_once'Conexao.php';
include_once'../model/PaisModel.php';

class PaisDao{

    public static function inserir($pais){
        $sql = "INSERT INTO pais (nome, sigla) VALUES"
        ."('".$pais->getNome()."','".$pais->getSigla()."');";
        Conexao::executar($sql);
    }


    public static function buscar(){
        $sql = "SELECT id, nome, sigla FROM pais ORDER BY nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != NUll){
            while(list($_id, $_nome, $_sigla) = mysqli_fetch_row($result)){
                $pais = new Pais();
                $pais->setId($_id);
                $pais->setNome($_nome);
                $pais->setSigla($_sigla);
                $lista->append($pais);
            }
        }
        return $lista;
    }

    public static function buscarPorId($id){
        $sql = "SELECT id, nome, sigla FROM pais WHERE id=".$id;
        $result = Conexao::consultar($sql);
        if($result != NULL){
            list($_id, $_nome, $_sigla) = mysqli_fetch_row($result);
            $pais = new Pais();
            $pais->setId($_id);
            $pais->setNome($_nome);
            $pais->setSigla($_sigla);
        }
        return $pais;
    }

    public static function editar($pais){

        $sql = "UPDATE pais SET "
               ."nome = '".$pais->getNome()."',"  
               ."sigla = '".$pais->getSigla()."' "  
               ."WHERE id = ".$pais->getId();
         echo $sql;      
        Conexao::executar($sql);
    }

    
    public static function excluir($id){
        $sql = "DELETE from pais WHERE id=".$id;
        Conexao::executar($sql);
    }

}

?>