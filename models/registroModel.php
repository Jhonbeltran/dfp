<?php

class registroModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function verificarEmail($email)
    {
        $id = $this->_db->query(
                "select id from usuarios where email = '$email'"
                );
        
        if($id->fetch()){
            return true;
        }
        
        return false;
    }
    
    public function registrarUsuario($nombres, $apellidos, $cedula, $email, $telefono, $pass)
    {		
        $this->_db->prepare(
                "INSERT INTO `usuarios`(`id`, `nombres`, `apellidos`, `cedula`, `email`, `telefono`, `pass`, `id_rol`, `id_estado`) VALUES". "(null,:nombres, :apellidos, :cedula, :email, :telefono, :pass, :id_rol, :id_estado);"
                )
                ->execute(array(
                    ':nombre' => $nombres,
                    ':apellidos' => $apellidos,
                    ':cedula' => $cedula,
                    ':email' => $email,
                    ':telefono' => $telefono,
                    ':pass' => Hash::getHash('sha1', $pass, HASH_KEY),
                    ':id_rol' => $id_rol,
                    ':id_estado' => $id_estado
                ));
    }
    
    public function getUsuario($id, $codigo)
	{
		$usuario = $this->_db->query(
					"select * from usuarios where id = $id and codigo = '$codigo'"
					);
					
		return $usuario->fetch();
	}
	
	public function activarUsuario($id, $codigo)
	{
		$this->_db->query(
					"update usuarios set estado = 1 " .
					"where id = $id and codigo = '$codigo'"
					);
	}
}

?>
