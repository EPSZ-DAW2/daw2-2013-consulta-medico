<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Perfiles', 'url'=>array('index')),
	array('label'=>'Crear Perfiles', 'url'=>array('create'), 'visible'=>$this->esPerfil('sysadmin')),
	array('label'=>'Actualizar Perfiles', 'url'=>array('update', 'id'=>$model->name), 'visible'=>$this->esPerfil('sysadmin')),
	array('label'=>'Eliminar Perfiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->name),'confirm'=>'¿Estás seguro que desea eliminar el perfil?'), 'visible'=>$this->esPerfil('sysadmin')),
	array('label'=>'Gestionar Perfiles', 'url'=>array('admin'), 'visible'=>$this->esPerfil('sysadmin')),
);
?>

<h1>Resumen perfil creado #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'type',
		'description',
	),
	'cssFile' => false,
)); ?>
