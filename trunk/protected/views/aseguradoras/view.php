<?php
/* @var $this AseguradorasController */
/* @var $model Aseguradoras */

$this->breadcrumbs=array(
	'Aseguradoras'=>array('index'),
	$model->idAseguradora,
);

$this->menu=array(
	array('label'=>'List Aseguradoras', 'url'=>array('index')),
	array('label'=>'Create Aseguradoras', 'url'=>array('create')),
	array('label'=>'Update Aseguradoras', 'url'=>array('update', 'id'=>$model->idAseguradora)),
	array('label'=>'Delete Aseguradoras', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idAseguradora),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Aseguradoras', 'url'=>array('admin')),
);
?>

<h1>View Aseguradoras #<?php echo $model->idAseguradora; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idAseguradora',
		'Nombre',
		'Notas',
	),
)); ?>
