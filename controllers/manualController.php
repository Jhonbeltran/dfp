<?php

class manualController extends Controller
{
    private $_manual;

    public function __construct() {
        parent::__construct();
        $this->_manual = $this->loadModel('manual');
        
    }
    
    public function index()
    {
        
        //$this->_view->posts = $post->getPosts();
        
        $this->_view->titulo = 'Contabilidad Manual';
        //$this->_view->manual = $this->_manual->getManual();
        //$this->_view->consecutivo = $this->_manual->getConsecutivo();
        $this->_view->consultar = $this->_manual->getManual();

        $this->_view->renderizar('index', 'manual');

    }
    public function nuevo()
    {
        
        //$this->_view->posts = $post->getPosts();
        
        $this->_view->titulo = 'Ingreso de Contabilidad';
        $this->_view->puc = $this->_manual->getPuc();
        $this->_view->consecutivo = $this->_manual->getConsecutivo();
      //$this->_view->consultar = $this->_manual->getManual();


        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            

            if(!$this->getPostParam('fecha')){
                $this->_view->_error = 'Debe introducir un codigo de la cuenta ';
                $this->_view->renderizar('nuevo', 'manual');
                exit;
            }

            if(!$this->getPostParam('documento')){
                $this->_view->_error = 'Debe introducir un documento';
                $this->_view->renderizar('nuevo', 'manual');
                exit;
            }

            if(!$this->getPostParam('descripcion')){
                $this->_view->_error = 'Se requiere una descripción';
                $this->_view->renderizar('nuevo', 'manual');
                exit;
            }

            for ($i=0; $i <= $this->getPostParam('i') ; $i++) { 
                
                if(!$this->getPostParam('cuenta'.$i)){
                    $this->_view->_error = 'Se requiere una cuenta';
                    $this->_view->renderizar('nuevo', 'manual');
                    exit;
                }

                /*if(!$this->getPostParam('nombre'.$i)){
                    $this->_view->_error = 'Se requiere un nombre';
                    $this->_view->renderizar('nuevo', 'manual');
                    exit;
                }*/

                if(!$this->getPostParam('valor'.$i)){
                    $this->_view->_error = 'Se requiere un valor';
                    $this->_view->renderizar('nuevo', 'manual');
                    exit;
                }

                if(!$this->getPostParam('naturaleza'.$i)){
                    $this->_view->_error = 'Se requiere una naturaleza';
                    $this->_view->renderizar('nuevo', 'manual');
                    exit;
                }
            }

            $lastInsertId = $this->_manual->setManual(
                    $this->getPostParam('consecutivo'),
                    $this->getPostParam('fecha'),
                    $this->getPostParam('documento'),
                    $this->getPostParam('descripcion')
                    );

            if(!$lastInsertId){
                $this->_view->_error = 'Error al registrar';
                $this->_view->renderizar('nuevo', 'manual');
                exit;
            }

            for ($j=0; $j <= $this->getPostParam('i') ; $j++) { 

                $movimiento = $this->_manual->setMovimiento(
                    $this->getPostParam('valor'.$j),
                    $this->getPostParam('cuenta'.$j),
                    $this->getPostParam('naturaleza'.$j),
                    $lastInsertId,
                    '1'
                    );

                if(!$movimiento){
                $this->_view->_error = 'Error al registrar los movimientos';
                $this->_view->renderizar('nuevo', 'manual');
                exit;
            }
            }

             $this->redireccionar('manual');
        } 

        $this->_view->renderizar('nuevo', 'manual');
    }

    public function ver($id)
    {
        if (!isset($id)) {
            $this->redireccionar('manual');
            exit;
        }

        $this->_view->titulo = 'Contabilidad Manual';
        $this->_view->consultar = $this->_manual->getManualPorId($id);

        $this->_view->renderizar('ver', 'manual');

    }
}

?>