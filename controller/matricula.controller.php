<?php
require_once 'model/matricula.php';
require_once  'model/curso.php';
require_once  'model/alumno.php';
class MatriculaController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Matricula();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/matricula/matricula.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $mat = new Matricula();

        if(isset($_REQUEST['id_alumno'])){
            $mat = $this->model->Obtener($_REQUEST['id_curso'],$_REQUEST['id_alumno']);
        }

        require_once 'view/header.php';
        require_once 'view/matricula/matricula-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $mat = new Matricula();

        $mat->Curso_id = $_REQUEST['id_curso'];
        $mat->Alumno_id = $_REQUEST['id_alumno'];
        $mat->Alumno_antiguo= $_REQUEST['id_alumnoA'];
        $mat->Curso_antiguo= $_REQUEST['id_cursoA'];

        $mat->Curso_antiguo > 0
            ? $this->model->Actualizar($mat)
            : $this->model->Registrar($mat);

        header('Location: index.php?c=Matricula');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_curso'],$_REQUEST['id_alumno']);
        header('Location: index.php?c=Matricula');
    }
}