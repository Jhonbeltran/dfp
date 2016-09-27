<?php

class manualModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function setManual($consecutivo, $fecha, $numRecibo, $descripcion)
    {
        $sql = "INSERT INTO `conmanual` (`id`, `consecutivo`, `fecha`, `numRecibo`, `descripcion`) VALUES (NULL, '$consecutivo', '$fecha', '$numRecibo', '$descripcion');";
        $this->_db->query($sql);

        return  $this->_db->lastInsertId();
    }

    public function setMovimiento($valor, $id_puc, $id_naturaleza, $id_conManual, $id_estado)
    {
        $sql = "INSERT INTO `movimientos` VALUES (NULL, '$valor', '$id_puc', '$id_naturaleza', '$id_conManual', '$id_estado');";
               
        //return $sql;
        return $this->_db->query($sql);
    }

    public function getPuc()
    {
        $manual = $this->_db->query("SELECT * FROM puc");
        return $manual->fetchall();
    }

    public function getConsecutivo()
    {
        $consecutivo = $this->_db->query("SELECT * FROM conmanual ORDER BY `consecutivo` DESC LIMIT 1");
        return $consecutivo->fetchall();
    }

    public function getManual()
    {
        $manual = $this->_db->query("SELECT * FROM conmanual");
        return $manual->fetchall();
    }

    public function getManualPorId($id)
    {
        $manual = $this->_db->query("SELECT * FROM conmanual WHERE id = '$id'");
        return $manual->fetchall();
    }

    public function getClasificacion()
    {
        $clasificacion = $this->_db->query("SELECT * FROM `clasificacion`");
        return $clasificacion->fetchall();
    }

     public function getCodigo($valor)
    {
        $consulta = $this->_db->query(
                "select * from puc " .
                "where codigo like '".$valor."%'"
                );
        
        return $consulta->fetchall();
    }
    
}
?>