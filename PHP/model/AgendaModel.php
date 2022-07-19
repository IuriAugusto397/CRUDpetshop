<?php
class Agenda{
    private $id;
    private $hora;
    private $datae;

    public function __construct($hora=null, $datae=null)
    {
        $this->hora = $hora;
        $this->datae = $datae;
    }

    /**
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get the value of datae
     */ 
    public function getData()
    {
        return $this->datae;
    }

    /**
     * Set the value of datae
     *
     * @return  self
     */ 
    public function setData($datae)
    {
        $this->datae = $datae;

        return $this;
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
}
?>