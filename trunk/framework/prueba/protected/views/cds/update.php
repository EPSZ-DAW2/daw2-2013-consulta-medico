<?php
/* @var $this CdsController */
/* @var $model Cds */

$this->breadcrumbs=array(
	'Cds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cds', 'url'=>array('index')),
	array('label'=>'Create Cds', 'url'=>array('create')),
	array('label'=>'View Cds', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cds', 'url'=>array('admin')),
);
?>

<h1>Update Cds <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>