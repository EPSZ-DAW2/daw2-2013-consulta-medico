<?php
/* @var $this CdsController */
/* @var $model Cds */

$this->breadcrumbs=array(
	'Cds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cds', 'url'=>array('index')),
	array('label'=>'Create Cds', 'url'=>array('create')),
	array('label'=>'Update Cds', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cds', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cds', 'url'=>array('admin')),
);
?>

<h1>View Cds #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'titel',
		'interpret',
		'jahr',
		'id',
	),
)); ?>
