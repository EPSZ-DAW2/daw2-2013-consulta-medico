<?php
/* @var $this PerfilesController */
/* @var $model Perfiles */

$this->breadcrumbs=array(
	'Perfiles'=>array('index'),
	$model->IdPerfil=>array('view','id'=>$model->IdPerfil),
	'Update',
);

$this->menu=array(
	array('label'=>'List Perfiles', 'url'=>array('index')),
	array('label'=>'Create Perfiles', 'url'=>array('create')),
	array('label'=>'View Perfiles', 'url'=>array('view', 'id'=>$model->IdPerfil)),
	array('label'=>'Manage Perfiles', 'url'=>array('admin')),
);
?>

<h1>Update Perfiles <?php echo $model->IdPerfil; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>