<?php
include_once'Conexao.php';
include_once'../model/ClientesModel.php';
class ClientesDao{

    public static function inserir($clientes){
        $sql = "INSERT INTO clientes (nome, nacionalidade, cpf, email, telefone, endereco, numero, cidade, complemento) VALUES"
        ."('".$clientes->getNome()."','".$clientes->getNacionalidade()."','".$clientes->getCpf()."','".$clientes->getEmail()."','".$clientes->getTelefone()."','".$clientes->getEndereco()."','".$clientes->getNumero()."','".$clientes->getCidade()."','".$clientes->getComplemento()."' );";
        Conexao::executar($sql);
    }

    public static function buscar(){
        $sql = "SELECT id, nome, nacionalidade, cpf, email, telefone, endereco, numero, cidade, complemento FROM clientes ORDER BY nome";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != NUll){
            while(list($_id, $_nome, $_nacionalidade, $_cpf, $_email, $_telefone, $_endereco, $_numero, $_cidade, $_complemento) = mysqli_fetch_row($result)){
                $clientes = new Clientes();
                $clientes->setId($_id);
                $clientes->setNome($_nome);
                $clientes->setNacionalidade($_nacionalidade);
                $clientes->setCpf($_cpf);
                $clientes->setEmail($_email);
                $clientes->setTelefone($_telefone);
                $clientes->setEndereco($_endereco);
                $clientes->setNumero($_numero);
                $clientes->setCidade($_cidade);
                $clientes->setComplemento($_complemento);
                $lista->append($clientes);
            }
        }
        return $lista;
    }

    public static function buscarPorId($id){
        $sql = "SELECT id, nome, nacionalidade, cpf, email, telefone, endereco, numero, cidade, complemento FROM clientes WHERE id=".$id;
        $result = Conexao::consultar($sql);
        if($result != NUll){
           list($_id, $_nome, $_nacionalidade, $_cpf, $_email, $_telefone, $_endereco, $_numero, $_cidade, $_complemento) = mysqli_fetch_row($result);
                $clientes = new Clientes();
                $clientes->setId($_id);
                $clientes->setNome($_nome);
                $clientes->setNacionalidade($_nacionalidade);
                $clientes->setCpf($_cpf);
                $clientes->setEmail($_email);
                $clientes->setTelefone($_telefone);
                $clientes->setEndereco($_endereco);
                $clientes->setNumero($_numero);
                $clientes->setCidade($_cidade);
                $clientes->setComplemento($_complemento);
        }
        return $clientes;

    }    

    public static function editar($clientes){

        $sql = "UPDATE clientes SET "
               ."nome = '".$clientes->getNome()."',"  
               ."nacionalidade = '".$clientes->getNacionalidade()."'," 
               ."cpf = '".$clientes->getCpf()."',"
               ."email = '".$clientes->getEmail()."',"  
               ."telefone = '".$clientes->getTelefone()."',"  
               ."endereco = '".$clientes->getEndereco()."',"  
               ."numero = '".$clientes->getNumero()."',"  
               ."cidade = '".$clientes->getCidade()."',"     
               ."complemento = '".$clientes->getComplemento()."'"  
               ."WHERE id = ".$clientes->getId();
        Conexao::executar($sql);
    }


    public static function excluir($id){
        $sql = "DELETE from clientes WHERE id=".$id;
        Conexao::executar($sql);
    }

}
?>

