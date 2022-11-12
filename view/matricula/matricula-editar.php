<h1 class="page-header">
    <?php echo $mat->Curso_id != null ? $mat->Nombre . " | ". $mat->NombreCurso : 'Nuevo Registro';?>

</h1>

<ol class="breadcrumb">
    <li><a href="?c=Curso">Cursos</a></li>
    <li class="active"><?php echo $mat->Curso_id != null ?$mat->Nombre . " | ". $mat->NombreCurso : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-matri" action="?c=Matricula&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_cursoA" value="<?php echo $mat->Curso_id != null ? $mat->Curso_id :-1; ?>" />
    <input type="hidden" name="id_alumnoA" value="<?php echo $mat->Alumno_id; ?>" />

    <div class="form-group">
        <label for="alumnoss">Nombre</label>
        <select id="alumnoss" name="id_alumno" from="frm-matri">
            <?php $alu=new Alumno(); foreach ($alu->Listar() as $r):?>
                <option  value=<?php echo $r->id ?> ><?php echo $r->Nombre ." ". $r->Apellido ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Curso</label>
        <select id="cursoss" name="id_curso" from="frm-alumno">
            <?php $cu=new Curso(); foreach ($cu->Listar() as $r):?>
            <option  value=<?php echo $r->id?> ><?php echo $r->Nombre?></option>
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
