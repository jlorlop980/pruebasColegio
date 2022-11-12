<h1 class="page-header">Matriculas</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Alumno">Alumnos</a><a class="btn btn-primary" href="?c=Curso">Cursos</a><a class="btn btn-primary" href="?c=Matricula&a=Crud">Nueva Matriculación</a>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th style="width:180px;">Nombre</th>
        <th>Apellido</th>
        <th style="width:120px;">Curso</th>
        <th style="width:60px;"></th>
        <th style="width:60px;"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Apellido; ?></td>
            <td><?php echo $r->NombreCurso; ?></td>

            <td>
                <a href="?c=Matricula&a=Crud&id_curso=<?php echo $r->Curso_id; ?>&id_alumno=<?php echo $r->Alumno_id ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=matricula&a=Eliminar&id_curso=<?php echo $r->Curso_id; ?>&id_alumno=<?php echo $r->Alumno_id ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

