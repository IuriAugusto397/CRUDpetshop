<?php
class Pets{
    private $id;
    private $nome;
    private $tutor;
    private $raca;
    private $idade;
    private $info;

    
    public function __construct($nome = NULL, $tutor =NULL, $raca =NULL, $idade =NULL, $info =NULL )
    {
        $this->nome = $nome;
        $this->tutor = $tutor;
        $this->raca = $raca;
        $this->idade = $idade;
        $this->info = $info;
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
     * Get the value of tutor
     */ 
    public function getTutor()
    {
        return $this->tutor;
    }

    /**
     * Set the value of tutor
     *
     * @return  self
     */ 
    public function setTutor($tutor)
    {
        $this->tutor = $tutor;

        return $this;
    }

    /**
     * Get the value of raca
     */ 
    public function getRaca()
    {
        return $this->raca;
    }

    /**
     * Set the value of raca
     *
     * @return  self
     */ 
    public function setRaca($raca)
    {
        $this->raca = $raca;

        return $this;
    }

    /**
     * Get the value of idade
     */ 
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * Set the value of idade
     *
     * @return  self
     */ 
    public function setIdade($idade)
    {
        $this->idade = $idade;

        return $this;
    }

    /**
     * Get the value of info
     */ 
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set the value of info
     *
     * @return  self
     */ 
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }
}
?>