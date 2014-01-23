<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	$model->IdPerfil,
);

$this->menu=array(
	array('label'=>'List Perfiles', 'url'=>array('index')),
	array('label'=>'Create Perfiles', 'url'=>array('create')),
	array('label'=>'Update Perfiles', 'url'=>array('update', 'id'=>$model->IdPerfil)),
	array('label'=>'Delete Perfiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdPerfil),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Perfiles', 'url'=>array('admin')),
);
?>

<h1>View Perfiles #<?php echo $model->IdPerfil; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdPerfil',
		'Nombre',
	),
)); ?>
