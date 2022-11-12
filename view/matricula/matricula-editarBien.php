<h1 class="page-header">
    <?php echo $mat->Curso_id != null ? $mat->Nombre . " | ". $mat->NombreCurso : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Curso">Cursos</a></li>
    <li class="active"><?php echo $mat->Curso_id != null ?$mat->Nombre . " | ". $mat->NombreCurso : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Matricula&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_cursoA" value="<?php echo $mat->Curso_id; ?>" />
    <input type="hidden" name="id_alumnoA" value="<?php echo $mat->Alumno_id; ?>" />

    <div class="form-group">
        <label>Nombre</label>
        <select id="alumnoss" name="id_alumno" from="frm-alumno">
            <?php foreach ($this->model->Listar() as $r):?>
                <option  value=<?php echo $r->Alumno_id ?> ><?php echo $r->Nombre ." ". $r->Apellido ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Curso</label>
        <select id="cursoss" name="id_curso" from="frm-alumno">
            <?php foreach ($this->model->Listar() as $r):?>
                <option  value=<?php echo $r->Curso_id?> ><?php echo $r->NombreCurso ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>

</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>

