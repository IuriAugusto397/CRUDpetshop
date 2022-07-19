<?php
include_once'Conexao.php';
include_once'../model/AgendaModel.php';
class AgendaDao{

    public static function inserir($agenda){
        $sql = "INSERT INTO agenda (hora, datae) VALUES"
        ."('".$agenda->getHora()."','".$agenda->getData()."' );";
        Conexao::executar($sql);
    }

    public static function buscar(){
        $sql = "SELECT id, hora, datae FROM agenda ORDER BY datae";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != NUll){
            while(list($_id, $_hora, $_datae) = mysqli_fetch_row($result)){
                $agenda = new Agenda();
                $agenda->setId($_id);
                $agenda->sethora($_hora);
                $agenda->setData($_datae);
                $lista->append($agenda);
            }
        }
        return $lista;
    }

    public static function buscarPorId($id){
        $sql = "SELECT id, hora, datae FROM agenda WHERE id=".$id;
        $result = Conexao::consultar($sql);
        if($result != NUll){
           list($_id, $_hora, $_datae) = mysqli_fetch_row($result);
                $agenda = new Agenda();
                $agenda->setId($_id);
                $agenda->setHora($_hora);
                $agenda->setData($_datae);
        }
        return $agenda;

    }    

    public static function excluir($id){
        $sql = "DELETE FROM agenda WHERE id=".$id;
        Conexao::executar($sql);
    }

}
?>