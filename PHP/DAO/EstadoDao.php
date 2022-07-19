<?php
include_once'Conexao.php';
include_once'../model/EstadoModel.php';

class EstadoDao{

    public static function inserir($estado){
        $sql = "INSERT INTO estado (nome, uf, id_pais) VALUES"
        ."('".$estado->getNome()."','".$estado->getUf()."','".$estado->getPais()."');";
        Conexao::executar($sql);
    }

    public static function buscar(){
        $sql = "SELECT e.id, e.nome, e.uf, e.id_pais, p.nome, p.sigla"
              ." FROM estado e, pais p"
              ." WHERE p.id = e.id_pais"
              ." ORDER BY e.nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != NUll){
            while(list($_id, $_nome, $_uf, $_idPais, $_nomePais, $_siglaPais)
             = mysqli_fetch_row($result)){
                $pais = new Pais();
                $pais->setId($_idPais);
                $pais->setNome($_nomePais);
                $pais->setSigla($_siglaPais);

                $estado = new Estado();
                $estado->setId($_id);
                $estado->setNome($_nome);
                $estado->setUf($_uf);
                $estado->setPais($pais);

                $lista->append($estado);
            }
        }

        return $lista;
    }

    public static function buscarPorId($id){
        $sql = "SELECT id, nome, uf, id_pais FROM estado WHERE id=".$id;
        $result = Conexao::consultar($sql);
        if($result != NUll){
           list($_id, $_nome, $_uf, $_pais) = mysqli_fetch_row($result);
                $estado = new Estado();
                $estado->setId($_id);
                $estado->setNome($_nome);
                $estado->setUf($_uf);
                $estado->setPais($_pais);
        }
        return $estado;

    }    

    public static function editar($estado){

        $sql = "UPDATE estado SET "
               ."nome = '".$estado->getNome()."',"  
               ."uf = '".$estado->getUf()."',"  
               ."id_pais = '".$estado->getPais()."'"  
               ."WHERE id = ".$estado->getId();
        Conexao::executar($sql);
    }


    public static function excluir($id){
        $sql = "DELETE from estado WHERE id=".$id;
        Conexao::executar($sql);
    }
        

}






?>