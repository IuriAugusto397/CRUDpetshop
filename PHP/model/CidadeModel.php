<?php
class Cidade{
    private $id;
    private $nome;
    private $cep;
    private $idPais;
    private $idEstado;

    public function __construct($nome=null, $cep=null)
    {
        $this->nome = $nome;
        $this->cep = $cep;
    }
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of cep
     */ 
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */ 
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of idPais
     */ 
    public function getIdPais()
    {
        return $this->idPais;
    }

    /**
     * Set the value of idPais
     *
     * @return  self
     */ 
    public function setIdPais($idPais)
    {
        $this->idPais = $idPais;

        return $this;
    }

    /**
     * Get the value of idEstado
     */ 
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set the value of idEstado
     *
     * @return  self
     */ 
    public function setIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;

        return $this;
    }
}

?>