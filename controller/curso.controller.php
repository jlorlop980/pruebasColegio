<?php
require_once 'model/curso.php';

class CursoController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Curso();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/curso/curso.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $cur = new Curso();

        if(isset($_REQUEST['id'])){
            $cur = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/curso/curso-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $cur = new Curso();

        $cur->id = $_REQUEST['id'];
        $cur->Nombre = $_REQUEST['Nombre'];

        $cur->id > 0
            ? $this->model->Actualizar($cur)
            : $this->model->Registrar($cur);

        header('Location: index.php?c=Curso');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php?c=Curso');
    }
}
