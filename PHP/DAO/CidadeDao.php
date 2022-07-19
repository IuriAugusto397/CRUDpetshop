<?php
include_once'Conexao.php';
include_once'../model/CidadeModel.php';

class CidadeDao{

    public static function inserir($cidade){
        $sql = "INSERT INTO cidade (nome, cep, id_pais, id_estado) VALUES"
        ."('".$cidade->getNome()."','".$cidade->getCep()."','".$cidade->getIdPais()."','".$cidade->getIdEstado()."');";
        Conexao::executar($sql);
    }

    public static function buscar(){
        $sql = "SELECT id, nome, cep, id_pais, id_estado FROM cidade ORDER BY nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != NUll){
            while(list($_id, $_nome, $_cep, $_id_pais, $_id_estado) = mysqli_fetch_row($result)){
                $cidade = new Cidade();
                $cidade->setId($_id);
                $cidade->setNome($_nome);
                $cidade->setCep($_cep);
                $cidade->setIdPais($_id_pais);
                $cidade->setIdEstado($_id_estado);
                $lista->append($cidade);
            }
        }
        return $lista;
    }

    public static function buscarPorId($id){
        $sql = "SELECT id, nome, cep, id_pais, id_estado FROM cidade WHERE id=".$id;
        $result = Conexao::consultar($sql);
        if($result != NUll){
           list($_id, $_nome, $_cep, $_id_pais, $_id_estado) = mysqli_fetch_row($result);
                $cidade = new Cidade();
                $cidade->setId($_id);
                $cidade->setNome($_nome);
                $cidade->setCep($_cep);
                $cidade->setIdPais($_id_pais);
                $cidade->setIdEstado($_id_estado);
        }
        return $cidade;

    }    

    public static function editar($cidade){

        $sql = "UPDATE cidade SET "
               ."nome = '".$cidade->getNome()."',"  
               ."cep = '".$cidade->getCep()."'," 
               ."id_pais = '".$cidade->getIdPais()."',"   
               ."id_estado = '".$cidade->getIdEstado()."'"  
               ."WHERE id = ".$cidade->getId();
        Conexao::executar($sql);
    }


    public static function excluir($id){
        $sql = "DELETE from cidade WHERE id=".$id;
        Conexao::executar($sql);
    }

} 
?>

