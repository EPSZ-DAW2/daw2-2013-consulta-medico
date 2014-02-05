<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->IdUsuario,
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuarios', 'url'=>array('create')),
	array('label'=>'Actualizar Usuarios', 'url'=>array('update', 'id'=>$model->IdUsuario)),
	array('label'=>'Eliminar Usuarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdUsuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Resumen usuario creado #<?php echo $model->usuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdUsuario',
		'usuario',
		'clave',
		'nombre',
		'FechaHoraUltimaConexion',
		'numFallos',
	),
)); ?>

<br>
<h3>Administración de roles</h3>
<ul>

<?php
foreach (Yii::app()->authManager->getAuthItems() as $data):
$enabled = Yii::app()->authManager->checkAccess($data->name, $model->IdUsuario);
 ?>
	<li>
		<h4>
			<?php echo $data->name ?>
			<?php echo CHtml::button($enabled?"Desactivar":"Activar", array('onclick' => 'js:document.location.href="index.php?r=usuarios/assign&id='.$model->IdUsuario.'&item='.$data->name.'"'));?>
		</h4>
		<p>
			<?php
				echo $enabled?"<span style=\"color: green;\"class=\"label\">Activado</span>":"";
			 	echo $data->description;
			 ?>
		</p>
	</li>
<?php
endforeach;
?>
</ul>