<?php

class categoriaController extends AppController
{

	protected $categoria;
	public function __construct(){
		parent::__construct();
		$this->categoria = new classPDO();
		
	}
     
	public function index(){
		$this->_view->titulo = "Listado categorias";
		$this->_view->categoria = $this->categoria->find('categorias', 'all');
		$this->_view->setLayout('default');
		$this->_view->renderizar('index');
		//$tareas = $this->loadmodel("tarea");
		//$this->_view->tareas = $tareas->getTareas();
		// TITULO QUE SE VISUALZARA EN LA URL.
		//$this->_view->renderizar("index");

	}
	
     /**
      * edit para editar categoria  
      * @param  int $id categia a editar 
      * @return string  vista 
      * function edit(){
      * }
      */

	public function edit($id = NULL){

	if ($_POST){
			if($this->categoria->update('categorias', $_POST)){
	           $this->redirect(
	      	          array('controller'=>'categoria','action'=>'index'
	      	          	)
	      	        );
        }else{
        	$this->redirect(
        	          array(
        	                'controller'=>'categoria',
        	                'action'=>'edit/'.$_POST['id']
        	               )
        	          );
                }

        }else{

/**
 * hace una consulta y rellena los input
 */
		$conditions = array(
			      'conditions'=>'id='.$id);
		$this->_view->categoria=$this->categoria->find(
			'categorias',
			'first',
			$conditions
		);


		$this->_view->titulo="Editar categoria";
		$this->_view->renderizar('edit');
exit;

	}
}
   /**
    * add agregar categorias 
    * @return string vista
    *function add(){ 
    * }
    * 
    */
public function add(){
		if ($_POST){
			if($this->categoria->save('categorias',$_POST)){
	           $this->redirect(
	      	          array('controller'=>'categoria','action'=>'index'
	      	          	)
	      	        );
        }else{$this->redirect(
        	                  array(
        	                  	'controller'=>'categoria','action'=>'add'
        	               )
        	          );
    }
		}else{

			$this->_view->titulo="Agregar categoria";
			$this->_view->renderizar=("add");


		}
		$this->_view->renderizar('add');

	  }
/**
 * delete elimina registros de categorias 
 * @param  int $id parmetro que contiene la id del registro a eliminar
 * function delete(){
 *
 * }
 * 
 * 
 */
    public function delete($id){
	$condition='id='.$id;
	if ($this->categoria->delete('categorias', $condition)) {
		$this->redirect(array('controller'=>'categoria'));
	  }
   }

}
