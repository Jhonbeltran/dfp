<?php

class registroController extends Controller
{
    private $_registro;
    
    public function __construct() {
        parent::__construct();
        
        $this->_registro = $this->loadModel('registro');
    }
    
    public function index()
    {
        if(Session::get('autenticado')){
            $this->redireccionar();
        }
        
        $this->_view->titulo = 'Registro';
        
        if($this->getInt('enviar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getPostParam('nombres')){
                $this->_view->_error = 'Debe introducir su nombre';
                $this->_view->renderizar('index', 'registro');
                exit;
            }

            if(!$this->getPostParam('apellidos')){
                $this->_view->_error = 'Debe introducir su apellido';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
        
            if(!$this->getPostParam('cedula')){
                $this->_view->_error = 'Debe introducir su cedula';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_view->_error = 'La direccion de email es inv&aacute;lida';
                $this->_view->renderizar('index', 'registro');
                exit;
            }

            
            if($this->_registro->verificarEmail($this->getPostParam('email'))){
                $this->_view->_error = 'Esta direccion de correo ya esta registrada';
                $this->_view->renderizar('index', 'registro');
                exit;
            }

              if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_view->_error = 'La direccion de email es inv&aacute;lida';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if(!$this->getPostParam('telefono')){
                $this->_view->_error = 'Debe introducir su telefono';
                $this->_view->renderizar('index', 'registro');
                exit;
            }

            if(!$this->getPostParam('pass')){
                $this->_view->_error = 'Debe introducir su password';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if($this->getPostParam('pass') != $this->getPostParam('confirmar')){
                $this->_view->_error = 'Los passwords no coinciden';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if($this->getPostParam('id_rol') == "0"){
                $this->_view->_error = 'Debe seleccionar el rol de la cuenta';
                $this->_view->renderizar('index', 'registro');
                exit;
            }

            if($this->getPostParam('id_estado') == "0"){
                $this->_view->_error = 'Debe seleccionar el estado de la cuenta';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
			
            $this->_registro->setUsuario(
                    $this->getPostParam('nombres'),
                    $this->getPostParam('apellidos'),
                    $this->getPostParam('cedula'),
                    $this->getPostParam('telefono'),
                    $this->getPostParam('pass'),
                    $this->getPostParam('email'),
                    $this->getPostParam('id_rol'),
                    $this->getPostParam('id_estado')
                    );
            
			$email = $this->_registro->verificarEmail($this->getPostParam('email'));
			
            if(!$email){
                $this->_view->_error = 'Error al registrar el email';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
			
		/*	$mail->From = 'www.mvc.dlancedu.com';
			$mail->FromName = 'Tutorial MVC';
			$mail->Subject = 'Activacion de cuenta de usuario';
			$mail->Body = 'Hola <strong>' . $this->getPostParam('nombre') . '</strong>,' .
							'<p>Se ha registrado en www.mvc.dlancedu.com para activar ' .
							'su cuenta haga clic sobre el siguiente enlace:<br>' .
							'<a href="' . BASE_URL .'registro/activar/' . 
							$usuario['id'] . '/' . $usuario['codigo'] . '">' .
							BASE_URL .'registro/activar/' . 
							$usuario['id'] . '/' . $usuario['codigo'] .'</a>' ;
			
			$mail->AltBody = 'Su servidor de correo no soporta html';
			$mail->AddAddress($this->getPostParam('email'));
			$mail->Send();
             
            $this->_view->datos = false;
            $this->_view->_mensaje = 'Registro Completado, revise su email para activar su cuenta';
            */
        }        
        
        $this->_view->renderizar('index', 'registro');
    }

	public function activar($id, $codigo)
	{
		if(!$this->filtrarInt($id) || !$this->filtrarInt($codigo)){
			$this->_view->_error = 'Esta cuenta no existe';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}
		
		$row = $this->_registro->getUsuario(
						$this->filtrarInt($id),
						$this->filtrarInt($codigo)
						);
						
		if(!$row){
			$this->_view->_error = 'Esta cuenta no existe';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}
		
		if($row['estado'] == 1){
			$this->_view->_error = 'Esta cuenta ya hav sido activada';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}

		$this->_registro->activarEmail(
						$this->filtrarInt($id),
						$this->filtrarInt($codigo)
						);
						
		$row = $this->_registro->getEmail(
						$this->filtrarInt($id),
						$this->filtrarInt($codigo)
						);
						
		if($row['estado'] == 0){
			$this->_view->_error = 'Error al activar la cuenta, por favor intente mas tarde';
            $this->_view->renderizar('activar', 'registro');
            exit;
		}
		
		$this->_view->_mensaje = 'Su cuenta ha sido activada';
		$this->_view->renderizar('activar', 'registro');
	}
}

?>
