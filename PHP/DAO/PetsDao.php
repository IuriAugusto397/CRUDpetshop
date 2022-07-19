<?php
include_once'Conexao.php';
include_once'../model/PetsModel.php';
class PetsDao{

    public static function inserir($pets){
        $sql = "INSERT INTO pets (nome, tutor, raca, idade, info) VALUES"
        ."('".$pets->getNome()."','".$pets->getTutor()."','".$pets->getRaca()."','".$pets->getIdade()."','".$pets->getInfo()."'  );";
        Conexao::executar($sql);
    }

    public static function buscar(){
        $sql = "SELECT id, nome, tutor, raca, idade, info FROM pets ORDER BY nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != NUll){
            while(list($_id, $_nome, $_tutor, $_raca, $_idade, $_info) = mysqli_fetch_row($result)){
                $pets = new Pets();
                $pets->setId($_id);
                $pets->setNome($_nome);
                $pets->setTutor($_tutor);
                $pets->setRaca($_raca);
                $pets->setIdade($_idade);
                $pets->setInfo($_info);
                $lista->append($pets);
            }
        }
        return $lista;
    }

    public static function buscarPorId($id){
        $sql = "SELECT id, nome, tutor, raca, idade, info FROM pets WHERE id=".$id;
        $result = Conexao::consultar($sql);
        if($result != NUll){
           list($_id, $_nome, $_tutor, $_raca, $_idade, $_info) = mysqli_fetch_row($result);
                $pets = new Pets();
                $pets->setId($_id);
                $pets->setNome($_nome);
                $pets->setTutor($_tutor);
                $pets->setRaca($_raca);
                $pets->setIdade($_idade);
                $pets->setInfo($_info);
        }
        return $pets;

    }    

    public static function editar($pets){

        $sql = "UPDATE pets SET "
               ."nome = '".$pets->getNome()."',"  
               ."tutor = '".$pets->getTutor()."'," 
               ."raca = '".$pets->getRaca()."',"
               ."idade = '".$pets->getIdade()."',"   
               ."info = '".$pets->getInfo()."'"  
               ."WHERE id = ".$pets->getId();
        Conexao::executar($sql);
    }


    public static function excluir($id){
        $sql = "DELETE from pets WHERE id=".$id;
        Conexao::executar($sql);
    }

}


?>
