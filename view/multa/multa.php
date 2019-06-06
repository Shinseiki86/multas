    <?php 
        if (!isset($_SESSION)) { session_start(); }
        if(!$_SESSION["user"]){
            header('Location: ./');
        }
    ?>
<h1 class="page-header">Multas Por Vehiculo Y Propietario</h1>

<div class="well well-sm text-right">
    <div class="row">
        <div class="col-xs-10">
            <form action="#" method="get" class="sidebar-form">
                <input type="hidden" name="c" value="multa">
                <input type="hidden" name="a" value="Filtrar">
                <div class="input-group">
                    <input type="text" name="filter" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><span class="glyphicon glyphicon-search"></span>
                </button>
              </span>
                </div>
            </form>
        </div>
        <div class="col-xs-2">
         <a id="btn-new-multa" class="btn btn-primary" href="?c=Multa&a=Crud">Nueva Multa</a>
        </div>
    </div>
</div>

<?php
    if(isset($_REQUEST['filter']))
        echo 'No se encuentran registros con el texto "'.$_REQUEST['filter'].'".';
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Multa</th>
            <th>Fecha Multa</th>
            <th>Propietario</th>
            <th>Placa</th>
            <th>Descripcion</th>
            <th>Estado Multa</th>
            <th>Valor Multa</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php 
		foreach($this->model->ListarMultaUsuario($_SESSION["user"], $_SESSION["rol"]) as $r): 
	?>
        <tr>
            <td><?php echo $r->id_multa; ?></td>
            <td><?php echo $r->fecha_multa; ?></td>
            <td><?php echo substr($r->nombre." ".$r->apellido, 0,20); ?></td>
            <td><?php echo $r->id_placa; ?></td>
            <td><?php echo $r->descripcion_multa; ?></td>
            <td>
            <?php
            $val = $r->estado_multa;
            $desc = "";
            if($val == 1){
                $desc = "Pendiente de Pago";
            }else if($val == 2){
                $desc = "Pagada";
            }else if($val == 3){
                $desc = "Preescrita";
            }
            echo $desc; 
            ?>
            </td>
            <td><?php echo $r->valor_multa; ?></td>
            <td>
                <a id="col-editar" href="?c=Multa&a=Crud&id_multa=<?php echo $r->id_multa; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Multa&a=Eliminar&id_multa=<?php echo $r->id_multa; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 


    <?php 
        if (isset($_SESSION) && ($_SESSION["rol"] != 0)) {
		  echo '<script>';
		  echo '$("#btn-new-multa").addClass("hide");';
		  echo '$("tr td:nth-child(8)").hide();';
		  echo '$("tr td:nth-child(9)").hide();';
		  echo '</script>';
		}

    ?>
