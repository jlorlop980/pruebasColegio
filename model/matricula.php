<?php

class Matricula
{
    private $pdo;

    public $Curso_id;
    public $Alumno_id;
    public $Nombre;
    public $Curso_antiguo;
    public $Alumno_antiguo;


    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Database::StartUp();
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("select cursos.Nombre as NombreCurso,alumnos.Apellido,alumno_curso.Alumno_id,alumno_curso.Curso_id, alumnos.Nombre from cursos,alumnos, alumno_curso where Curso_id=cursos.id and alumnos.id=Alumno_id;");


            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($Curso_id,$Alumno_id)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("select cursos.Nombre as NombreCurso,alumnos.Apellido,alumno_curso.Alumno_id,alumno_curso.Curso_id, alumnos.Nombre 
                                from cursos,alumnos, alumno_curso  WHERE Curso_id = ? and Alumno_id = ?");


            $stm->execute(array($Curso_id,$Alumno_id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($Curso_id,$Alumno_id)
    {
        try
        {
            $stm = $this->pdo
                ->prepare("DELETE FROM alumno_curso WHERE Curso_id = ? and Alumno_id = ?");

            $stm->execute(array($Curso_id,$Alumno_id));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try
        {
            $sql = "UPDATE alumno_curso SET 
						Curso_id          = ?, 
						Alumno_id        = ? 
				    WHERE Curso_id = ? and Alumno_id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Curso_id,
                        $data->Alumno_id,
                        $data->Curso_antiguo,
                        $data->Alumno_antiguo
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Matricula $data)
    {
        try
        {
            $sql = "INSERT INTO alumno_curso (Curso_id,Alumno_id) 
		        VALUES (?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->Curso_id,
                        $data->Alumno_id,
                    )
                );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}