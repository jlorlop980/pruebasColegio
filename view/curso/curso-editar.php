<h1 class="page-header">
    <?php echo $cur->id != null ? $cur->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
    <li><a href="?c=Curso">Cursos</a></li>
    <li class="active"><?php echo $cur->id != null ? $cur->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Curso&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $cur->id; ?>" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $cur->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
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
