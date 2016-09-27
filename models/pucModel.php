<?php

class pucModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function setPuc($codigo, $nombre, $id_clasificacion)
    {
        $sql = "INSERT INTO `puc` VALUES (null, $codigo, '$nombre', $id_clasificacion)";
               
        return $this->_db->query($sql);
    }

    public function getPuc()
    {
        $puc = $this->_db->query("SELECT * FROM puc INNER JOIN clasificacion ON puc.id_clasificacion = clasificacion.id");
        return $puc->fetchall();
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
                "where codigo like '".$valor."%'".
                "or nombre like '%".$valor."%'"
                );
        
        return $consulta->fetchall();
    }
    
}

?>