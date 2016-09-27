<?php

class pucController extends Controller
{
	private $_puc;

    public function __construct() {
        parent::__construct();
        $this->_puc = $this->loadModel('puc');

    }
    
    public function index()
    {       
        //$this->_view->posts = $post->getPosts();
        $this->_view->titulo = 'PUC';
        $this->_view->pucs = $this->_puc->getPuc();
        $this->_view->clasificacion = $this->_puc->getClasificacion();

        if($this->getInt('consultar') == 1){
            $this->redireccionar('puc/consultar/'.$this->getPostParam('valor'));
            exit;
        }

        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getPostParam('codigo')){
                $this->_view->_error = 'Debe introducir un codigo de la cuenta ';
                $this->_view->renderizar('index', 'puc');
                exit;
            }

            if(!$this->getPostParam('nombre')){
                $this->_view->_error = 'Debe introducir el nombre de la cuenta';
                $this->_view->renderizar('index', 'puc');
                exit;
            }

             if($this->getPostParam('id_clasificacion') == "0"){
                $this->_view->_error = 'Debe seleccionar la clasificacion de la cuenta';
                $this->_view->renderizar('index', 'puc');
                exit;
            }

             $this->_puc->setPuc(

                    $this->getPostParam('codigo'),
                    $this->getPostParam('nombre'),
                    $this->getPostParam('id_clasificacion')
                    );

             $this->redireccionar('puc');
        }

        $this->_view->renderizar('index', 'puc');

	}

    public function consultar($valor = false){

        if($this->getInt('consultar') == 1){
            $this->redireccionar('puc/consultar/'.$this->getPostParam('valor'));
            //$this->_view->consultar = $this->_puc->getCodigo($this->getPostParam('valor'));            
        }
        else if (isset($valor)) {
            $this->_view->consultar = $this->_puc->getCodigo($valor);           
        }

        $this->_view->renderizar('consultar');
    }

}
?>