<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	$model->IdPerfil,
);

$this->menu=array(
	array('label'=>'Listar perfiles', 'url'=>array('index')),
	array('label'=>'Crear perfil', 'url'=>array('create')),
	array('label'=>'Actualizar perfil', 'url'=>array('update', 'id'=>$model->IdPerfil)),
	array('label'=>'Eliminar perfil', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdPerfil),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar perfiles', 'url'=>array('admin')),
);
?>

<h1>Resumen perfil creado #<?php echo $model->IdPerfil; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdPerfil',
		'Nombre',
	),
)); ?>
