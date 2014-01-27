<?php
/* @var $this AseguradorasController */
/* @var $model Aseguradoras */

$this->breadcrumbs=array(
	'Aseguradorases'=>array('index'),
	$model->idAseguradora=>array('view','id'=>$model->idAseguradora),
	'Update',
);

$this->menu=array(
	array('label'=>'List Aseguradoras', 'url'=>array('index')),
	array('label'=>'Create Aseguradoras', 'url'=>array('create')),
	array('label'=>'View Aseguradoras', 'url'=>array('view', 'id'=>$model->idAseguradora)),
	array('label'=>'Manage Aseguradoras', 'url'=>array('admin')),
);
?>

<h1>Update Aseguradoras <?php echo $model->idAseguradora; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>