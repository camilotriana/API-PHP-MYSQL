<?php
class PrinterDTO{
    protected $id_inventario;
    protected $serial;
    protected $marca;
    protected $fecha_ingreso;

    /**
     * Get the value of id_inventario
     */ 
    public function getId_inventario()
    {
        return $this->id_inventario;
    }

    /**
     * Set the value of id_inventario
     *
     * @return  self
     */ 
    public function setId_inventario($id_inventario)
    {
        $this->id_inventario = $id_inventario;

        return $this;
    }

    /**
     * Get the value of serial
     */ 
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Set the value of serial
     *
     * @return  self
     */ 
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get the value of marca
     */ 
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */ 
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get the value of fecha_ingreso
     */ 
    public function getFecha_ingreso()
    {
        return $this->fecha_ingreso;
    }

    /**
     * Set the value of fecha_ingreso
     *
     * @return  self
     */ 
    public function setFecha_ingreso($fecha_ingreso)
    {
        $this->fecha_ingreso = $fecha_ingreso;

        return $this;
    }
}
?>